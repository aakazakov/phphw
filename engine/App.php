<?php

declare(strict_types=1);

namespace app\engine;

use app\engine\{Render, TwigRender, Request};

class App
{
    public static function Run(Request $request) : void
    {
        $controllerName = empty($request->getControllerName()) ? 'product' : $request->getControllerName();
        $actionName = empty($request->getActionName()) ? '' : $request->getActionName();
        $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render);
            $controller->runAction($actionName);
        } else {
            echo 'Bad news: 404 (no controller)';
        }
    }
}
