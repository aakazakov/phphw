<?php

declare(strict_types=1);

namespace app\controller;

class App
{
    public static function Run() : void
    {
        static::applyController();
    }

    private static function applyController($url = null) : void
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = empty($url[1]) ? 'product' : $url[1];
        $actionName = empty($url[2]) ? '' : $url[2]; // Иначе выдаёт предупреждение
        $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass;
            $controller->runAction($actionName);
        } else {
            echo 'Bad news: 404 (no controller)';
        }
    }
}
