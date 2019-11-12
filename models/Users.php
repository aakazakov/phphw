<?php

declare(strict_types=1);

namespace app\models;

use app\models\DbModel;

class Users extends DbModel
{
    private $login;
    private $pass;
    protected $props = [
        'login', 'pass'
    ];

    public function __construct(string $login = null, string $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function getTableName() : string
    {
        return 'users';
    }
}
