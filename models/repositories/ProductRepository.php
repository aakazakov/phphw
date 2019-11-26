<?php

declare(strict_types=1);

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Product;

class ProductRepository extends Repository
{
    public function getTableName() : string
    {
        return 'goods';
    }
    public function getEntityClass()
    {
        return Product::class;
    }
}
