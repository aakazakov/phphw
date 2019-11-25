<?php

declare(strict_types=1);

namespace app\models\repositories;

class OrdersRepository
{
    public static function getTableName() : string
    {
        return 'orders';
    }
}