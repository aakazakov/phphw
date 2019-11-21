<?php

declare(strict_types=1);

namespace app\engine;

use app\traits\TSingletone;
use \PDO;
use PDOException;

class Db
{
    use TSingletone;

    private $connection = null;
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop_db',
        'charset' => 'utf8'
    ];

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = []) : array
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function getLastId() : int
    {
        return (int) $this->connection->lastInsertId();
    }

    public function execute(string $sql, array $params)
    {
        $this->query($sql, $params);
        return $this;
    }

    private function query(string $sql, array $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryObject(string $sql, array $params, $className)
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
        return $pdoStatement->fetch();
    }

    private function getConnection() : PDO
    {
        if (is_null($this->connection)) {
            $this->connection = new PDO(
                $this->prepareDSNString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDSNString() : string
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}
