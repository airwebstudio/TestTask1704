<?php
namespace TT\Data;
use TT\Validators\Validator;

class Dto {
    private $ip_address;
    private $user_agent;
    private $view_date;
    private $url;
    private $views_count;

    public function __construct(array $data) {
        $validator = new Validator();

        if (!$validator->validate($data)) {
            throw new \Exception('Validation failed');
        }

        $this->ip_address = $data['ip_address'];
        $this->user_agent = $data['user_agent'];
        $this->view_date = $data['view_date'];
        $this->url = $data['url'];
    }

    public function getIpAddress() {
        return $this->ip_address;
    }

    public function getUserAgent() {
        return $this->user_agent;
    }

    public function getViewDate() {
        return $this->view_date;
    }

    public function getUrl() {
        return $this->url;
    }

}