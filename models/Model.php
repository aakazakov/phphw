<?php

declare(strict_types=1);

namespace app\models;

abstract class Model
{
    protected $props = [];

    public function __set($property, $value)
    {
        if (
            array_key_exists($property, $this->props)
            && $value != $this->$property
        ) {
            $this->$property = $value;
            $this->props[$property] = true;
        }
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __isset($property)
    {
        return isset($this->$property);
    }
}
