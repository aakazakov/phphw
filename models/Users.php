<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Users extends Model
{
    private $id;
    private $login;
    private $pass;

    public function getTableName() : string
    {
        return 'users';
    }
}
