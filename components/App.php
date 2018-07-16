<?php

namespace components;


class App
{
    use \components\traits\SingletonTrait;

    public $auth = null;
    public $db = null;
    public $request = null;

    public function init() {
        $this->db = DB::getInstance();

        $this->request = new RequestHandler();
        $this->request->init();
    }

    public static function getAppRootDir() {
        return $_SERVER["DOCUMENT_ROOT"] . "/../";
    }


}