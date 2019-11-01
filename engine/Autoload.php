<?php

declare(strict_types=1);

class Autoload
{
    public function LoadClass($className)
    {
        include "../models/{$className}.php";
    }
}
