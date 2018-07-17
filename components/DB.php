<?php

namespace components;


use components\traits\SingletonTrait;

class DB
{
    private $pdo = null;
    public $dbName = "test-php-project";
    public $dbUser = "root";
    public $dbPass = "";
    public $dbHost = "localhost";
    public $charset = "utf8";
    public $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // associative array by default
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION // errors throw exceptions by default
    ];

    use SingletonTrait;

    public function getPDO() {

        if(empty($this->pdo)) {
            $this->pdo = new \PDO(
                "mysql:host = {$this->dbHost};dbname={$this->dbName};charset={$this->charset}",
                $this->dbUser,
                $this->dbPass,
                $this->options
            );
        }

        return $this->pdo;
    }

    public function init() {
        $this->getPDO();
    }


}