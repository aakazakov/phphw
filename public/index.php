<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\engine\Autoload;
use app\controller\App;
use app\models\Product;

spl_autoload_register([new Autoload, 'LoadClass']);

App::Run();
