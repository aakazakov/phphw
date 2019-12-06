<?php

declare(strict_types=1);

namespace app\controller;

use app\engine\App;
use app\controller\Controller;
use app\models\entities\Basket;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        if (empty($login) || empty($pass)) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
        if (!App::call()->usersRepository->auth($login, $pass)) {
            die('Неверный логин/пароль');
        } else {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }

    public function actionlogout()
    {
        if (App::call()->basketRepository->getCountWhere('session_id', session_id())) {
            App::call()->basketRepository->doDeleteBySession(new Basket(session_id()));
        }
        session_regenerate_id();
        session_destroy();
        header("location: /");
        exit();
    }
}
