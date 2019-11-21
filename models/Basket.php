<?php

declare(strict_types=1);

namespace app\models;

use app\models\DbModel;
use app\engine\Db;

class Basket extends DbModel
{
    protected $id;
    protected $session_id;
    protected $goods_id;
    protected $props = [
        'session_id', 'goods_id'
    ];

    public function __construct(string $session_id = null, int $goods_id = null)
    {
        $this->session_id = $session_id;
        $this->goods_id = $goods_id;
    }

    public static function getTableName() : string
    {
        return 'basket';
    }

    public static function getBasket($session_id)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price
        FROM basket b, goods p WHERE b.goods_id = p.id AND session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }
}
