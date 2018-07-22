<?php

namespace components;


/**
 * This class and it's children process user requests and connect models and views.
 * @package components
 */
abstract class Controller
{
    private $defaultLayout = "layout";
    protected $renderer = null;

    public function __construct() {
        $this->renderer = new \components\renderers\OwnRenderer();
    }

    public function render($template, $params = []) {
        return $this->renderer->render($template, $params);
    }

    public function renderLayout($template, $params = [], $layout = null) {
        $content = $this->renderer->render($template, $params);

        if (empty($layout)) {
            $layout = $this->defaultLayout;
        }

        return $this->renderer->render($layout, ["content" => $content]);
    }

    public function redirect($url) {
        header("Location:" . $url);

        exit();
    }
}