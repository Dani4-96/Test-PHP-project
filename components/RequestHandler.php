<?php

namespace components;


use \Exception;

class RequestHandler
{
    protected $controller = "users";
    protected $action = "index";
    protected $controllerNamespace = "controllers";

    public $getParams = [];
    public $postParams = [];
    public $files = [];

    public function init() {

        $this->getParams = $_GET;
        $this->postParams = $_POST;
        $this->files = $_FILES;

        $url = trim($_SERVER["REQUEST_URI"], "/");

        if ($cleanUrl = stristr($url, "?", true)) {
            $path = explode("/", $cleanUrl);
        } else {
            $path = explode("/", $url);
        }

        if (count($path) == 2) {
            $this->controller = $path[0];
            $this->action = $path[1];
        } elseif (count($path) == 1 && !empty($path[0])) {
            $this->controller = $path[0];
        }

        $classController = $this->controllerNamespace . "\\" . ucfirst($this->controller) . "Controller";

        $action = "action" . ucfirst($this->action);

        if (class_exists($classController)) {
            $instanceController = new $classController();

            if (method_exists($instanceController, $action)) {
                call_user_func_array([$instanceController, $action], [$this]);
            } else {
                throw new Exception("Method does not exists!");
            }
        } else {
            throw new Exception("Class does not exists!");
        }

    }
}