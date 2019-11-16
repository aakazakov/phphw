<?php

declare(strict_types=1);

namespace app\models;

abstract class Model
{
    protected $setProperties = [];
    protected $props = [];

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            if ($this->$property != $value) {
                $this->setProperties[$property] = $value;
            }
        }
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }    
    }
}
