<?php

namespace controllers;

use components\Controller;
use models\Users;

class UsersController extends Controller
{
    public function actionIndex() {
        $usersModel = new Users();

        echo $this->renderLayout("users/index", ["users" => $usersModel->getUsers()]);
    }


}