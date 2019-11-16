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

    // public function __set($property, $value)
    // {
    //     if (property_exists($this, $property)) {
    //         if ($this->$property != $value) {
    //             $this->changedProps[$property] = $value;
    //         }
    //     }
    // }

    // public function __get($property)
    // {
    //     if (property_exists($this, $property)) {
    //         return $this->$property;
    //     }    
    // }
}
