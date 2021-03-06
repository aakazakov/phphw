<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Users;

class UsersRepository extends Repository
{
    public function isAuth() : bool
    {
        return isset($_SESSION['login']);
    }

    public function getName()
    {
        return $_SESSION['login'];
    }

    public function auth($login, $pass)
    {
        $user = $this->getWhere('login', $login);
        if (!$user) {
            return false;
        }
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            if ($user->role) {
                $_SESSION['role'] = $user->role;
            }
            return true;
        }
    }

    public function isAdmin()
    {
        return ($_SESSION['role'] === 'admin') ? true : false;
    }

    public function getTableName() : string
    {
        return 'users';
    }

    public function getEntityClass() : string
    {
        return Users::class;
    }
}
