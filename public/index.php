<?php

declare(strict_types=1);

include '../engine/Autoload.php';

spl_autoload_register([new Autoload, 'LoadClass']);

$product = new Product(new Db());

var_dump($product);

echo $product->getOne(5);
echo $product->getAll();