<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\engine\App;
use app\models\Repository;
use app\models\entities\Basket;

class BasketRepository extends Repository
{    
    public function getBasket($session_id)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price
        FROM basket b, goods p WHERE b.goods_id = p.id AND session_id = :session_id";
        return App::Call()->db->queryAll($sql, ['session_id' => $session_id]);
    }

    public function getTableName() : string
    {
        return 'basket';
    }

    public function getEntityClass() : string
    {
        return Basket::class;
    }
}
