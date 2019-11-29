<?php

declare(strict_types=1);

namespace app\models;

abstract class Model
{
    protected $props = [];

    public function __set($property, $value) : void
    {
        if (
            array_key_exists($property, $this->props)
            && $value != $this->$property
        ) {
            $this->$property = $value;
            $this->props[$property] = true;
        }
    }

    public function setId($value) : void
    {
        $this->id = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __isset($property) : bool
    {
        return isset($this->$property);
    }
}
