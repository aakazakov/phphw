<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\engine\Autoload;
use app\engine\App;
use app\models\Product;

spl_autoload_register([new Autoload, 'LoadClass']);

App::Run();
// $prod = new Product('test', 'test', 123);
// $prod = Product::getOne(2);
// $prod->image = 240;
// $prod->save();
// var_dump($prod->image);
