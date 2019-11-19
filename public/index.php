<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\engine\{App, Autoload};
use app\models\Product;

spl_autoload_register([new Autoload, 'LoadClass']);
require_once '../vendor/autoload.php';

App::Run();

// $prod = Product::getOne(2);
// $prod->price = 290;
// $prod->save();
