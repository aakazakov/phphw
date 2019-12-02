<?php

declare(strict_types=1);

namespace app\models;

use app\engine\Db;
use app\models\repositories\BasketRepository;

abstract class Repository
{
    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll() : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    public function getWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$field} = :value";
        return Db::getInstance()->queryObject($sql, [":value" => $value], $this->getEntityClass());
    }

    public function getCountWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE {$field} = :value";
        return Db::getInstance()->queryOne($sql, [":value" => $value])['count'];
    }

    public function save(Model $entity) : void
    {
        is_null($entity->id) ? $this->doInsert($entity) : $this->doUpdate($entity);
    }

    public function doInsert(Model $entity) : void
    {
        $tableName = (new BasketRepository())->getTableName();
        $keys = [];
        $params = [];
        foreach (array_keys($entity->props) as $item) {
            $keys[] = "`$item`";
            $params[":{$item}"] = $entity->$item;
        }
        $keys = implode(', ', $keys);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ({$keys}) values ({$values})";
        Db::getInstance()->execute($sql, $params);
        $entity->setId(Db::getInstance()->getLastId());
    }

    public function doUpdate(Model $entity) : void
    {
        $tableName = (new BasketRepository())->getTableName();
        $changedFields = [];
        $params = [':id' => $entity->id];
        foreach ($entity->props as $key => $value) {
            if ($value !== true) continue;
            $changedFields[] = "`$key` = :{$key}";
            $params[":{$key}"] = $entity->$key;
            $entity->props[$key] = false;
        }
        $changedFields = implode(', ', $changedFields);
        $sql = "UPDATE `{$tableName}` SET {$changedFields}  WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
    }

    public function doDelete(Model $entity) : void
    {
        $tableName = (new BasketRepository())->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        Db::getInstance()->execute($sql, [':id' => $entity->id]);
    }

    abstract public function getTableName();
    abstract public function getEntityClass();
}
