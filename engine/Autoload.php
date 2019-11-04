<?php

declare(strict_types=1);

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
