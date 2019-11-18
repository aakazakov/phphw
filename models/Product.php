<?php

declare(strict_types=1);

namespace app\models;

use app\models\DbModel;

class Product extends DbModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;
    protected $props = [
        'name' => 0,
        'description' => 0,
        'price' => 0,
        'image' => 0
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
