<?php

namespace controllers;

use components\BaseException;
use components\Controller;
use components\RequestHandler;
use models\Users;

class UsersController extends Controller
{
    public function actionIndex(RequestHandler $request) {
        $usersModel = new Users();

        define("COUNTS_PER_PAGE", 5);
        define("OFFSET", 3);

        $currentPage = 1;
        $orderBy = "login ASC";

        if (isset($request->getParams["page"])) {
            $currentPage = $request->getParams["page"];
            //var_dump($request->getParams["page"]);
            $_SESSION["page"] = $request->getParams["page"];
        }

        if (!empty($request->postParams["order_by"])) {
            $_SESSION["order_by"] = $request->postParams["order_by"];
        }

        if (!empty($_SESSION["page"])) {
            $currentPage = $_SESSION["page"];
        }

        if (!empty($_SESSION["order_by"])) {
            $orderBy = $_SESSION["order_by"];
        }

        $count = $usersModel->countUsers();
        $pages = ceil($count / COUNTS_PER_PAGE);
        
        if ($currentPage > $pages || $currentPage <= 0) {
            $currentPage = $pages;
        }

        $firstNote = $currentPage * COUNTS_PER_PAGE - COUNTS_PER_PAGE;
        $countsPerPage = COUNTS_PER_PAGE;
        $limit = "{$firstNote}, {$countsPerPage}";

        var_dump($orderBy);
        var_dump($currentPage);
        //var_dump($limit);
        //var_dump($usersModel->getUsers($order_by, $limit));

        echo $this->renderLayout(
            "users/index",
            [
                "users"       => $usersModel->getUsers($orderBy, $limit),
                "count"       => $count,
                "pages"       => $pages,
                "currentPage" => $currentPage,
                "offset"      => OFFSET,
                "orderBy"     => $orderBy
            ]
        );
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

        if ($login == "admin") {
            echo "forbidden";
            return null;
        }

        $usersModel = new Users();
        $usersModel->deleteUserByLogin($login);

        $this->redirect("/users");
    }

    public function actionAdd(RequestHandler $request) {
        if (!empty($request->postParams)) {
            $usersModel = new Users();

            if ($usersModel->getUserByLogin($request->postParams["login"], false)) {
                throw new BaseException("User exists!");
            }

            $values = $request->postParams;
            $values["password"] = md5($values["password"]);

            $usersModel->insert($values);

            $this->redirect("/users");
        }

        echo $this->renderLayout("users/add");
    }

    public function actionEdit(RequestHandler $request) {
        $usersModel = new Users();

        $login = $request->getParams["login"];

        if ($login == "admin") {
            echo "forbidden";
            return null;
        }

        if (!empty($request->postParams)) {
            $usersModel = new Users();

            if ($usersModel->getUserByLogin($request->postParams["login"], false)) {
                throw new BaseException("User exists!");
            }

            $values = $request->postParams;
            $values["password"] = md5($values["password"]);

            $usersModel->updateUsersByLogin($login, $values);

            $this->redirect("/users");
        }

        echo $this->renderLayout("users/edit", ["user" => $usersModel->getUserByLogin($login)]);
    }
}