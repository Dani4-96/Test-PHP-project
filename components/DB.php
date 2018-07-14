<?php

namespace components;


class DB
{
    private $pdo = null;
    public $dbName;
    public $dbUser;
    public $dbPass;
    public $dbHost;
    public $charset;
    public $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // associative array by default
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION // errors throw exceptions by default
    ];

    public function __construct(
            $dbName = "test-php-project",
            $dbUser = "root",
            $dbPass = "",
            $dbHost = "localhost",
            $charset = "utf8"
        ) {
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbHost = $dbHost;
        $this->charset = $charset;
    }

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