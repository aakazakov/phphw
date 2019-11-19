<?php

declare(strict_types=1);

namespace app\engine;

use app\engine\{Render, TwigRender};

class App
{
    public static function Run() : void
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = empty($url[1]) ? 'product' : $url[1];
        $actionName = empty($url[2]) ? '' : $url[2];
        $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new TwigRender);
            $controller->runAction($actionName);
        } else {
            echo 'Bad news: 404 (no controller)';
        }
    }
}
