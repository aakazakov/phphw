<?php

declare(strict_types=1);

namespace app\engine;

use \PDO;

class Db
{

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    private $connection = null;

    private function query(string $sql)
    {
        return $this->getConnection()->query($sql);
    }

    private function getConnection() : PDO
    {
        if(is_null($this->connection)) {
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

    public function queryOne(string $sql, array $params = []) : string
    {
        return $sql;
    }

    public function queryAll(string $sql, array $params = []) : string
    {
        return $sql;
    }
}
