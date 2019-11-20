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
        'login', 'pass'
    ];

    public function __construct(string $login = null, string $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function isAuth() : bool
    {
        return isset($_SESSION['login']);
    }

    public static function getTableName() : string
    {
        return 'users';
    }
}
