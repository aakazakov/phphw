<?php

declare(strict_types=1);

class Autoload
{
    private $path = [
        'models',
        'engine'
    ];

    public function LoadClass($className)
    {
        foreach ($this->path as $path) {
            $fileName = "../{$path}/{$className}.php";
            if (file_exists($fileName)) {
                include $fileName;
                break;
            }
        }
    }
}
