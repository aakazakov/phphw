<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Orders extends Model
{
    protected $id;
    protected $user_id;
    protected $goods_id;
    protected $total_count;
    protected $total_price;

    public function __construct(
        int $user_id = null,
        int $goods_id = null,
        int $total_count = null,
        float $total_price = null
        ) {
        parent::__construct();
        $this->$user_id = $user_id;
        $this->$goods_id = $goods_id;
        $this->$total_count = $total_count;
        $this->$total_price = $total_price;
    }

    public function getTableName() : string
    {
        return 'orders';
    }
}
