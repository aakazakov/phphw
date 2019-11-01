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

    public function getOne(int $id) : string
    {
        $sql = "SELECT * FROM `goods` WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll() : string
    {
        $sql = "SELECT * FROM `goods`";
        return $this->db->queryOne($sql);
    }
}
