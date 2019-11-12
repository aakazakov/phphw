<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\models\{Product, Users, Basket, Orders};
use app\engine\Autoload;

spl_autoload_register([new Autoload, 'LoadClass']);

// $product = new Product('Пицца', 'Ассорти, 32см', 300);

// $product = Product::getOne(71);

// $product->doDelete();

// var_dump($product);

(new Product('Пицца', 'Ассорти, 32см', 300))->doInsert();
