<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Users extends Model
{
    private $login;
    private $pass;

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
