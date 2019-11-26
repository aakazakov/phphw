<?php

declare(strict_types=1);

use app\engine\{App, Autoload, AutoloadException};
// use app\models\{Product, Users, Basket};

// try {
    session_start();

    include realpath('../vendor/autoload.php');
    include realpath('../engine/Autoload.php');
    include realpath('../config/config.php');
    
    spl_autoload_register([new Autoload, 'LoadClass']);

    App::Run();
// } catch (AutoloadException $err) {
//     print_r($err->getMessage());
// } catch (\Exception $err) {
//     print_r('ERROR: ' . $err->getMessage());
// }
