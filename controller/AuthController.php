<?php

declare(strict_types=1);

namespace app\controller;

use app\engine\App;
use app\controller\Controller;

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
        session_destroy();
        header("location: /");
        exit();
    }
}