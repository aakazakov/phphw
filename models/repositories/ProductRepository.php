<?php

declare(strict_types=1);

namespace app\models\repositories;

class ProductRepository
{
    public static function getTableName() : string
    {
        return 'goods';
    }
}
