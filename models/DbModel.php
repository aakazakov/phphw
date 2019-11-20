<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;
use app\models\Model;

abstract class DbModel extends Model
{
    public static function getOne(int $id) : object
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

    public static function getWhere($field, $value) : object
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$field} = :value";
        return Db::getInstance()->queryObject($sql, ["value" => $value], static::class);
    }

    public function save()
    {
        is_null($this->id) ? $this->doInsert() : $this->doUpdate();
        return $this;
    }

    public function doInsert()
    {
        $tableName = static::getTableName();
        $keys = [];
        $params = [];
        foreach ($this as $key => $value) {
            if(!in_array($key, $this->props)) continue;
            $keys[] = "`$key`";
            $params[":{$key}"] = $value;
        }
        $keys = implode(', ', $keys);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ({$keys}) values ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->getLastId();
        return $this;
    }

    public function doUpdate()
    {
        $tableName = static::getTableName();
        $changedFields = [];
        $params = [':id' => $this->id];
        foreach ($this->props as $key => $value) {
            if ($value !== 1) continue;
            $changedFields[] = "`$key` = :{$key}";
            $params[":{$key}"] = $this->$key;
            $this->props[$key] = 0;
        }
        $changedFields = implode(', ', $changedFields);
        $sql = "UPDATE `{$tableName}` SET {$changedFields}  WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function doDelete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        Db::getInstance()->execute($sql, [':id' => $this->id]);
        return $this;
    }

    abstract public static function getTableName();
}
