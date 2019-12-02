<?php

declare(strict_types=1);

namespace app\models;

use app\engine\App;

abstract class Repository
{
    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return App::Call()->db->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll() : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return App::Call()->db->queryAll($sql);
    }

    public function getWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$field} = :value";
        return App::Call()->db->queryObject($sql, [":value" => $value], $this->getEntityClass());
    }

    public function getCountWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE {$field} = :value";
        return App::Call()->db->queryOne($sql, [":value" => $value])['count'];
    }

    public function save(Model $entity) : void
    {
        is_null($entity->id) ? $this->doInsert($entity) : $this->doUpdate($entity);
    }

    public function doInsert(Model $entity) : void
    {
        $tableName = App::Call()->basketRepository->getTableName();
        $keys = [];
        $params = [];
        foreach (array_keys($entity->props) as $item) {
            $keys[] = "`$item`";
            $params[":{$item}"] = $entity->$item;
        }
        $keys = implode(', ', $keys);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$tableName}` ({$keys}) values ({$values})";
        App::Call()->db->execute($sql, $params);
        $entity->setId(App::Call()->db->getLastId());
    }

    public function doUpdate(Model $entity) : void
    {
        $tableName = App::Call()->basketRepository->getTableName();
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
        App::Call()->db->execute($sql, $params);
    }

    public function doDelete(Model $entity) : void
    {
        $tableName = App::Call()->basketRepository->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        App::Call()->db->execute($sql, [':id' => $entity->id]);
    }

    abstract public function getTableName();
    abstract public function getEntityClass();
}
