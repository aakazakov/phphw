<?php

declare(strict_types=1);

namespace app\engine;

class Autoload
{
    public function LoadClass($className)
    {
        $file = realpath(str_replace(['app', '\\'], [ROOT_DIR, DS], $className) . '.php');
        if (file_exists($file)) {
            include $file;
        }
    }
}
