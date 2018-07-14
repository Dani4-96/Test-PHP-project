<?php

namespace components;


class App
{
    use \components\traits\SingletonTrait;

    public $auth = null;
    public $db = null;

    public function init() {
        echo "Hello World!";
        $this->db = new DB();
        $this->db->init();
    }


}