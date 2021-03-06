<?php

namespace components;


/**
 * The main class of application.
 * @package components
 */
class App
{
    use \components\traits\SingletonTrait;

    public $auth = null;
    public $db = null;
    public $request = null;

    public function init() {
        $this->db = DB::getInstance();

        $this->auth = Authorization::getInstance();

        $this->request = new RequestHandler();
        try {
            $this->request->init();
        } catch (BaseException $e) {
            echo "Exception: ", $e->getMessage();
        }
    }

    public static function getAppRootDir() {
        return $_SERVER["DOCUMENT_ROOT"] . "/../";
    }


}