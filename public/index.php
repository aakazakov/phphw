<?php

declare(strict_types=1);

include '../engine/Autoload.php';

use app\models\{Product, Users};
use app\engine\Db;
use app\engine\Autoload;

spl_autoload_register([new Autoload, 'LoadClass']);

$product = new Product(new Db());
echo $product->getOne(5);
echo $product->getAll();

$user = new Users(new Db());
echo $user->getOne(5);
echo $user->getAll();
