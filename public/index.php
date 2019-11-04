<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\models\{Product, Users};
use app\engine\{Db, Autoload};

spl_autoload_register([new Autoload, 'LoadClass']);

$db = new Db();

$product = new Product($db);
$user = new Users($db);

var_dump($product);
