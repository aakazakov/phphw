<?php

declare(strict_types=1);

namespace app\models;

use app\models\DbModel;

class Users extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $props = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = password_hash((string)$pass, PASSWORD_DEFAULT);
    }

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
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
    }

    public static function getTableName() : string
    {
        return 'users';
    }
}
