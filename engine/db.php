<?php

declare(strict_types=1);

namespace app\engine;

class Db
{
    public function queryOne(string $sql, array $params = []) : string
    {
        return $sql;
    }

    public function queryAll(string $sql, array $params = []) : string
    {
        return $sql;
    }
}
