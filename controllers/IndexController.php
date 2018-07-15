<?php

namespace controllers;


use components\Controller;

class IndexController extends Controller
{
    public function actionIndex() {
        echo $this->renderLayout("index/index");
    }
}