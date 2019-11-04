<?php

declare(strict_types=1);

namespace app\engine

class Autoload
{
    public function LoadClass($className)
    {
        $file = str_replace(['app', '\\'], ['..', '/'], $className) . '.php';
        if (file_exists($file)) {
            include $file;
        }
    }
}
