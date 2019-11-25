<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;

class OrdersRepository extends Repository
{
    public static function getTableName() : string
    {
        return 'orders';
    }
}
