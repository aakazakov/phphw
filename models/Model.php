<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;

abstract class Model
{
    private $db;

    abstract public function getTableName();

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne(int $id) : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function getAll() : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->queryAll($sql);
    }
}