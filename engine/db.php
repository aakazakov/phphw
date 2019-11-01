<?php

declare(strict_types=1);

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
