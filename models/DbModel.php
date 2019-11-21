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

    public static function getWhere($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$field} = :value";
        return Db::getInstance()->queryObject($sql, [":value" => $value], static::class);
    }

    public static function getCountWhere($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE {$field} = :value";
        return Db::getInstance()->queryOne($sql, [":value" => $value])['count'];
    }

    public function save() : void
    {
        is_null($this->id) ? $this->doInsert() : $this->doUpdate();
    }

    public function doInsert()
    {
        $tableName = static::getTableName();
        $keys = [];
        $params = [];
        foreach ($this->props as $item) {
            $keys[] = "`$item`";
            $params[":{$item}"] = $this->$item;
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
            if ($value !== true) continue;
            $changedFields[] = "`$key` = :{$key}";
            $params[":{$key}"] = $this->$key;
            $this->props[$key] = false;
        }
        $changedFields = implode(', ', $changedFields);
        $sql = "UPDATE `{$tableName}` SET {$changedFields}  WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function doDelete($id = null)
    {
        $tableName = static::getTableName();
        $id = $id ?: $this->id;
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        Db::getInstance()->execute($sql, [':id' => $id]);
        return $this;
    }

    abstract public static function getTableName();
}
