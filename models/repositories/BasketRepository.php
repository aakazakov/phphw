<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;
use app\models\enities\Basket;
use app\engine\Db;

class BasketRepository extends Repository
{    
    public static function getBasket($session_id)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price
        FROM basket b, goods p WHERE b.goods_id = p.id AND session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function getTableName() : string
    {
        return 'basket';
    }

    public function getEntityClass()
    {
        return Basket::class;
    }
}
