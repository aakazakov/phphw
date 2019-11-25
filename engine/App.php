<?php

declare(strict_types=1);

namespace app\engine;

use app\engine\{Render, TwigRender, Request};

class App
{
    public static function Run() : void
    {
        $controllerName = empty((new Request)->getControllerName()) ? 'product' : (new Request)->getControllerName();
        $actionName = empty((new Request)->getActionName()) ? '' : (new Request)->getActionName();
        $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render);
            $controller->runAction($actionName);
        }
    }
}
