<?php

declare(strict_types=1);

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
