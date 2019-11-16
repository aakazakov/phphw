<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\engine\Autoload;
use app\controller\App;
use app\models\Product;

spl_autoload_register([new Autoload, 'LoadClass']);

App::Run();

$prod = Product::getOne(2);

// $prod->price = 300;
// $prod->price = 250;

// var_dump($prod);
