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

    public function getTableName() : string
    {
        return 'orders';
    }
}
