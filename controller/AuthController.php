<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;
use app\engine\Request;
use app\models\Users;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request)->getParams()['login'];
        $pass = (new Request)->getParams()['pass'];
        if (!Users::auth($login, $pass)) {
            die('Неверный логин/пароль');
        } else {
            header("Location: /");
            exit();
        }
    }

    public function actionlogout()
    {
        session_destroy();
        header("location: /");
        exit();
    }
}