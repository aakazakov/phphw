<?php

declare(strict_types=1);

include '../engine/Autoload.php';

function __autoload($className)
{
    (new Autoload())->loadClass($className);
}

$product - new Product();

var_dump($product);
