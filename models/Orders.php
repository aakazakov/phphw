<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Order extends Model
{
    protected $id;
    protected $session_id;
    protected $goods_id;

    public function getTableName() : string
    {
        return 'orders';
    }
}
