<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;
use app\models\enities\Orders;

class OrdersRepository extends Repository
{
    public static function getTableName() : string
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Orders::class;
    }
}
