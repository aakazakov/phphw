<?php

declare(strict_types=1);

session_start();

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');
include realpath('../vendor/autoload.php');

use app\engine\{App, Autoload, Request};
use app\models\Product;

spl_autoload_register([new Autoload, 'LoadClass']);

App::Run();

// $prod = new Product('test', 'test', 123);
// $prod = Product::getOne(2);
// $prod->price = 290;
// $prod->save();
