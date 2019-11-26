<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;
use app\models\enities\Product;

class ProductRepository extends Repository
{
    public static function getTableName() : string
    {
        return 'goods';
    }
    public function getEntityClass()
    {
        return Product::class;
    }
}
