<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;
use app\engine\Request;
use app\models\enities\Users;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request)->getParams()['login'];
        $pass = (new Request)->getParams()['pass'];
        if (empty($login) || empty($pass)) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
        if (!Users::auth($login, $pass)) {
            die('Неверный логин/пароль');
        } else {
            header("Location: {$_SERVER['HTTP_REFERER']}");
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