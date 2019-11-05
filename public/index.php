<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\models\{Product, Users};
use app\engine\{Db, Autoload};

spl_autoload_register([new Autoload, 'LoadClass']);

$product = new Product();
$user = new Users();
