<?php

namespace controllers;


use components\Controller;
use components\RequestHandler;
use models\Users;

class AccountController extends Controller
{
    public function actionLogin(RequestHandler $request) {
        if (!empty($request->postParams)) {
            $modelUser = new Users();

            $user = $modelUser->getUserByLogin($request->postParams["login"]);

            if (!empty($user) && $user["password"] === md5($request->postParams["password"])) {
                $_SESSION["user"] = $user;
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false]);
            }

        }
    }

    public function actionLogout() {
        unset($_SESSION["user"]);
        $this->redirect("/");
    }
}