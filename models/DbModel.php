<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;
use app\models\Model;

abstract class DbModel extends Model
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

    public function save()
    {
        is_null($this->id) ? $this->doInsert() : $this->doUpdate();
        return this;
    }

    public function doInsert()
    {
        $tableName = static::getTableName();
        $keys = [];
        $params = [];
        foreach ($this as $key => $value) {
            if(!in_array($key, $this->props)) continue;
            $params[":{$key}"] = $value;
            $keys[] = "`$key`";
        }
        $keys = implode(', ', $keys);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ({$keys}) values ({$values})";
        Db::getInstance()->insert($sql, $params);
        $this->setId();
        return $this;
    }

    protected function setId() : void
    {
        $this->id = Db::getInstance()->getLastId();
    }

    public function doUpdate()
    {
        
    }

    public function doDelete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        Db::getInstance()->delete($sql, [':id' => $this->id]);
        return $this;
    }

    abstract public static function getTableName();
}