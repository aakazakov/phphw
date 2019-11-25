<?php

declare(strict_types=1);

namespace app\models\enities;

use app\models\Model;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;
    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'image' => false
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
}
