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

    public function getUsers($order_by) {
        $result = $this->select([
            "where" => "login != 'admin'",
            "order_by" => "{$order_by}"
        ]);

        return $result;
    }

    public function getUserByLogin($login, $withoutAdmin = true) {

        if ($withoutAdmin) {
            $result = $this->select([
                "where" => "login = '{$login}' AND login != 'admin'"
            ]);
        } else {
            $result = $this->select([
                "where" => "login = '{$login}'"
            ]);
        }

        //var_dump($result);
        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }

    }

    public function deleteUserByLogin($login) {
        $result = $this->delete([
            "where" => "login = '{$login}' AND login != 'admin'"
        ]);
        return $result;

    }
}