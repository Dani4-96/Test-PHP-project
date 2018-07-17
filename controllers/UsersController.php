<?php

namespace controllers;

use components\Controller;
use components\RequestHandler;
use models\Users;

class UsersController extends Controller
{
    public function actionIndex(RequestHandler $request) {
        $usersModel = new Users();

        $order_by = "login DESC";

        var_dump($request->postParams);
        if (!empty($request->postParams["order_by"])) {
            $order_by = $request->postParams["order_by"];
        }
        var_dump($order_by);


        echo $this->renderLayout("users/index", ["users" => $usersModel->getUsers($order_by)]);
    }

    public function actionView(RequestHandler $request) {
        $usersModel = new Users();

        $login = $request->getParams["login"];

        if ($login == "admin") {
            echo "forbidden";
            return null;
        }

        $user = $usersModel->getUserByLogin($login);

        echo $this->renderLayout("users/view", ["user" => $user]);
    }

    public function actionDelete(RequestHandler $request) {
        $login = $request->getParams["login"];

        $usersModel = new Users();
        $usersModel->deleteUserByLogin($login);

        $this->redirect("/users");
    }
}