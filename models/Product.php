<?php

declare(strict_types=1);

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;

    protected $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    protected function getOne(number $id)
    {
        $sql = "SELECT * FROM `goods` WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }
}
