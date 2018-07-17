<?php

namespace models;


use components\Model;

class Users extends Model
{
    public $table = "users";

    public $fields = [
        "login" => "varchar",
        "pass" => "varchar"
    ];

    public function getUsers() {
        $result = $this->select();

        return $result;
    }

    public function getUserByLogin($login) {
        $result = $this->select([
            "where" => "login = '{$login}'"
        ]);

        //var_dump($result);
        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }

    }
}