<?php

declare(strict_types=1);

namespace app\models\entities;

use app\models\Model;

class Orders extends Model
{
    protected $id;
    protected $user_name;
    protected $user_email;
    protected $session_id;
    protected $props = [
        'user_name' => false,
        'user-email' => false,
        'session_id' => false
    ];

    public function __construct(
        string $user_name = null,
        string $user_email = null,
        string $session_id = null
        ) {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->session_id = $session_id;
    }
}
