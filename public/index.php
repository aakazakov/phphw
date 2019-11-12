<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\models\{Product, Users, Basket, Orders};
use app\engine\Autoload;

spl_autoload_register([new Autoload, 'LoadClass']);

$controllerName = $_GET['c'] ? : 'product';
$controllerAction = $_GET['a'];
$controllerClass = "app\\controller\\" . ucfirst($controllerName) . "Controller";
var_dump($controllerClass);

/*
$product = new Product('Пицца', 'Ассорти, 32см', 300);
$product->save();
$product->doDelete();
$product = Product::getOne(1);
(new Product('Пицца', 'Ассорти, 32см', 300))->doInsert();
var_dump($product);
*/
