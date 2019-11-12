<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;

abstract class Model
{
    public static function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], static::class);
    }

    public static function getAll() : array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    public function doInsert() : void
    {
        $tableName = static::getTableName();
        $keys = "";
        $values = "";
        $params = [];
        foreach ($this as $key => $value) {
            if(!in_array($key, $this->props)) continue;
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
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        Db::getInstance()->delete($sql, [':id' => $this->id]);
    }

    abstract public static function getTableName();
}