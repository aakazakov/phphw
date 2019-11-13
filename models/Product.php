<?php

declare(strict_types=1);

namespace app\models;

use app\models\DbModel;

class Product extends DbModel
{
    protected $id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $props = [
        'name', 'description', 'price', 'image'
    ];

    public function __construct(
        string $name = null,
        string $description = null,
        float $price = null,
        string $image = null
        ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public static function getTableName() : string
    {
        return 'goods';
    }
}
