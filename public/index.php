<?php

declare(strict_types=1);

include realpath('../engine/Autoload.php');
include realpath('../config/config.php');

use app\engine\Autoload;

spl_autoload_register([new Autoload, 'LoadClass']);

applyController($url);
