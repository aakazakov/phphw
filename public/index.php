<?php

declare(strict_types=1);

use app\engine\{App, Autoload, AutoloadException};

try {
    session_start();

    include realpath('../vendor/autoload.php');
    // include realpath('../engine/Autoload.php');  // Now loading by Composer's loader.
    include realpath('../config/config.php');
    
    spl_autoload_register([new Autoload, 'LoadClass']);

    App::Run();
} catch (AutoloadException $err) {
    print_r('ERROR: ' . $err->getMessage());
} catch (\Exception $err) {
    print_r('ERROR: ' . $err->getMessage());
}
