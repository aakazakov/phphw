<?php

declare(strict_types=1);

include '../engine/Autoload.php';

spl_autoload_register([new Autoload, 'LoadClass']);

$product - new Product();

var_dump($product);
