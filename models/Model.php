<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;

abstract class Model
{
    private $db;

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

    public function insert()
    {
        $tableName = $this->getTableName();
        $keys = "";
        $values = "";
        $params = [];
        foreach ($this as $key => $value) {
            if ($key === 'db' || $key === 'id') {
                continue;
            }
            $params[":{$key}"] = $value;
            $keys .= "`{$key}`, ";
            $values .= ":{$key}, ";
        }
        $sql = "INSERT INTO `{$tableName}` ($keys) values ($values)";
        $sql = str_replace(', )', ')', $sql);
        $this->db->execute($sql, $params);
    }

    abstract public function getTableName();
}