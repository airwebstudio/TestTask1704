<?php
namespace TT;

use TT\Data\Dto;
use TT\Models\ClientModel;

class Banner {
    private $data;
    
    public function __construct() {
        $this->data = [
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'view_date' => date('Y-m-d'),
            'url' => $_SERVER['HTTP_REFERER']
        ];
    }

    public function saveToDb() {
        $model = new ClientModel();
        $model->doClient(new Dto($this->data));
    }
}