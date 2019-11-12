<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\models\{Product, Users, Basket, Orders};
use app\engine\Autoload;

spl_autoload_register([new Autoload, 'LoadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1]) ? 'product' : $url[1];
$actionName = $url[2];
$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
} else {
    echo 'Bad news: 404 (no controller)';
}

var_dump($controllerClass);

/*
$product = new Product('Пицца', 'Ассорти, 32см', 300);
$product->save();
$product->doDelete();
$product = Product::getOne(1);
(new Product('Пицца', 'Ассорти, 32см', 300))->doInsert();
var_dump($product);
*/
