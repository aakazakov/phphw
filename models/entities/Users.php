<?php

declare(strict_types=1);

namespace app\models\enities;

use app\models\Model;

class Users extends Model
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
