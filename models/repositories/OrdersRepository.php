<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Orders;

class OrdersRepository extends Repository
{
    public function getTableName() : string
    {
        return 'orders';
    }

    public function getEntityClass() : string
    {
        return Orders::class;
    }
}
