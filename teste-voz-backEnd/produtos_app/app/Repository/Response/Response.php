<?php

namespace App\Repository\Response;

class Response {

    public $data;
    public $msg;

    public function __construct(mixed $data, String $msg){

        $this->data = $data;
        $this->msg = $msg;

    }

    public function create(mixed $data, String $msg) {
        
        $this->data = $data;
        $this->msg = $msg;

    }   

}