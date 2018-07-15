<?php

namespace components\renderers;


use components\App;

class OwnRenderer
{
    private $templateDir = "templates/";
    private $templateExt = ".php";

    public function render($template, $params = []) {
        extract($params);

        $templateFile = App::getAppRootDir() . $this->templateDir . $template . $this->templateExt;

        if (file_exists($templateFile)) {
            ob_start();

            include $templateFile;

            $content = ob_get_clean();

            return $content;
        } else {
            var_dump($templateFile);
            echo "The page does not exists!";

            exit();
        }
    }
}