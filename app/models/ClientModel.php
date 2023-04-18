<?php
namespace TT\Models;

use TT\DB\Connection;
use TT\Data\Dto;

class ClientModel {
    
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::getPDO();
    }

    private function executeWithDto($pdoStatement, Dto $dto) {
        try {
            $pdoStatement->execute([
                ':ip_address' => $dto->getIpAddress(),
                ':user_agent' => $dto->getUserAgent(),
                ':view_date' => $dto->getViewDate(),
                ':url' =>  $dto->getUrl()
            ]);
        }
        catch(\Exception $e) {
            echo 'Wrong sql request!';
        }        
    }

    public function isClientExists(Dto $dto): bool 
    {
        $sql = 'SELECT 1 from clients_data WHERE ip_address = :ip_address AND user_agent = :user_agent AND view_date = :view_date AND url = :url';
        $pdoStatement = $this->pdo->prepare($sql);
        $this->executeWithDto($pdoStatement, $dto);

        return ($pdoStatement->rowCount() > 0);
    }

    public function incViewsCount(Dto $dto) {
        $sql = 'UPDATE clients_data SET views_count = views_count + 1 WHERE ip_address = :ip_address AND user_agent = :user_agent AND view_date = :view_date AND url = :url';
        $pdoStatement = $this->pdo->prepare($sql);
        $this->executeWithDto($pdoStatement, $dto);
    }

    public function createClient(Dto $dto) {
        //views_count by default == 1
        $sql = 'INSERT INTO clients_data (ip_address, user_agent, view_date, url) VALUES (:ip_address, :user_agent, :view_date, :url)';
        $pdoStatement = $this->pdo->prepare($sql);
        $this->executeWithDto($pdoStatement, $dto);
    }

    public function doClient(Dto $dto) {
        if ($this->isClientExists($dto)) {
            $this->incViewsCount($dto);

            return;
        }

        $this->createClient($dto);
    }
}