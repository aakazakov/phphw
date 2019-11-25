<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;

class ProductRepository extends Repository
{
    public static function getTableName() : string
    {
        return 'goods';
    }
}
