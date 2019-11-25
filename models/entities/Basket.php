<?php

declare(strict_types=1);

namespace app\models\enities;

use app\models\Model;

class Basket extends Model
{
    protected $id;
    protected $session_id;
    protected $goods_id;
    protected $props = [
        'session_id' => false,
        'goods_id' => false
    ];

    public function __construct(string $session_id = null, int $goods_id = null)
    {
        $this->session_id = $session_id;
        $this->goods_id = $goods_id;
    }
}
