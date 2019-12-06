<?php

declare(strict_types=1);

use app\engine\App;

include __DIR__ . '/../vendor/autoload.php';
$config = include __DIR__ . '/../config/config.php';

try {
    session_start();

    // include realpath('../vendor/autoload.php'); // == Old version ==
    // include realpath('../engine/Autoload.php');  // Now loading by Composer's loader.
    // include realpath('../config/config.php'); // == Old version ==
    
    // spl_autoload_register([new Autoload, 'LoadClass']); == Old version ==

    // App::Run(); // == Old version ==

    App::call()->run($config);
// } catch (AutoloadException $err) {
//     print_r('ERROR: ' . $err->getMessage());
} catch (\Exception $err) {
    print_r('ERROR: ' . $err->getMessage());
};
