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

    public function __construct(string $name, string $description, float $price)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName() : string
    {
        return 'goods';
    }
}
