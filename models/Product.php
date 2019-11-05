<?php

declare(strict_types=1);

namespace app\models;

use app\models\Model;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

    public function getTableName() : string
    {
        return 'goods';
    }
}
