<?php

declare(strict_types=1);

namespace app\models\entities;

use app\models\Model;

class Users extends Model
{
    protected $id;
    protected $role;
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
}
