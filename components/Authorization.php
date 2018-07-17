<?php

namespace components;


use components\traits\SingletonTrait;
use models\Users;

class Authorization
{
    use SingletonTrait;

    private $user;

    public function getUser() {
        return $this->user;
    }

    public static function checkAuth() {
        return !empty(self::getInstance()->getUser());
    }

    public static function getLogin() {
        if(!self::checkAuth()) {
            return null;
        }

        $user = self::getInstance()->getUser();

        return $user["login"];
    }

    public static function isAdmin() {
        $user = self::getInstance()->getUser();

        if(!empty($user["login"]) && $user["login"] == "admin") {
            return true;
        }

        return false;
    }

    public function init() {
        $this->user = null;

        $userModel = new Users();

        if(!empty($_SESSION["user"]["login"])) {
            $this->user = $userModel->getUserByLogin($_SESSION["user"]["login"],false);
        }
    }
}