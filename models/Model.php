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
            $this->props[$property] = 1;
        }
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }    
    }
}
