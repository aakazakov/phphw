<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Product extends Model
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function getTableName() : string
    {
        return 'goods';
    }
}
