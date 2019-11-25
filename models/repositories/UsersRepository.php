<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;

class UsersRepository extends Repository
{
    public static function isAuth() : bool
    {
        return isset($_SESSION['login']);
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

    public static function auth($login, $pass)
    {
        $user = static::getWhere('login', $login);
        if (!$user) {
            return false;
        }
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
    }

    public static function getTableName() : string
    {
        return 'users';
    }
}
