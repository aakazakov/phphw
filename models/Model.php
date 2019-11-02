<?php

declare(strict_types=1);

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    private $db;

    abstract public function getTableName();

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id) : string
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll() : string
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->queryOne($sql);
    }
}