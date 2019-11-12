<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Basket extends Model
{
    protected $id;
    protected $session_id;
    protected $goods_id;

    public function __construct(int $session_id = null, int $goods_id = null)
    {
        $this->session_id = $session_id;
        $this->goods_id = $goods_id;
    }

    public static function getTableName() : string
    {
        return 'goods';
    }
}
