<?php

namespace models;


use components\Model;

class Users extends Model
{
    public $table = "users";

    public $fields = [
        "login" => "",
        "pass" => ""
    ];

    public function getUsers() {
        $result = $this->select();

        return $result;
    }
}