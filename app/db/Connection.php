<?php
namespace TT\DB;
use TT\DB\DbConfig;

class Connection {
    private static $pdo;

    public static function getPDO() {
        try {
            if (!self::$pdo) {
                self::$pdo = new \PDO('mysql:host=' . DbConfig::HOST . ';dbname='.DbConfig::DB, DbConfig::USER, dbConfig::PASSWORD);
            }
            return self::$pdo;
        }
        catch (\Exception $e) {
            echo 'Wrong db connection!';
        }
        
    }
}