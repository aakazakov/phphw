<?php

declare(strict_types=1);

namespace app\engine;

class AutoloadException extends \Exception
{
    protected $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }
}

class Autoload
{
    public function LoadClass($className)
    {
        // если файла не существует, realpath возвращает false, file_exists не умеет работать с boolean,
        // поэтому вместо false присваивается пустая строка;
        $file = realpath(str_replace(['app', '\\'], [ROOT_DIR, DS], $className) . '.php') ?: '';
        if (file_exists($file)) {
            include $file;
        } else {
            throw new AutoloadException('Oops, something went wrong. Controller says: 404.');
        }
    }
}
