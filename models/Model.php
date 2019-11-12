<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;

abstract class Model
{
    public function getOne(int $id) : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryOne($sql, [':id' => $id]);
    }

    public function getAll() : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    public function doInsert() : void
    {
        $tableName = $this->getTableName();
        $keys = "";
        $values = "";
        $params = [];
        foreach ($this as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $params[":{$key}"] = $value;
            $keys .= "`{$key}`, ";
            $values .= ":{$key}, ";
        }
        $sql = "INSERT INTO `{$tableName}` ($keys) values ($values)";
        $sql = str_replace(', )', ')', $sql);
        Db::getInstance()->insert($sql, $params);
        $this->setId();
    }

    protected function setId() : void
    {
        $this->id = Db::getInstance()->getLastId();
    }

    public function doDelete() : void
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        Db::getInstance()->delete($sql, [':id' => $this->id]);
    }

    abstract public function getTableName();
}