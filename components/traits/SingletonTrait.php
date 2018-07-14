<?php

namespace components\traits;


trait SingletonTrait
{
    private static $instance;

    private function __clone() {}
    private function __wakeup() {}
    final private function __construct() {}
    protected function init() {}

    public static function getInstance() {

        if(empty(self::$instance)) {
            self::$instance = new self();
            self::$instance->init();
        }

        return self::$instance;
    }
}