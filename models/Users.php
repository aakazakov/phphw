<?php

declare(strict_types=1);

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
