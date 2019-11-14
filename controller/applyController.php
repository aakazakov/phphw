<?php

declare(strict_types=1);

namespace app\controller;

class ApplyController
{
    public function applyController($url) : void
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = empty($url[1]) ? 'product' : $url[1];
        $actionName = $url[2];
        $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass;
            $controller->runAction($actionName);
        } else {
            echo 'Bad news: 404 (no controller)';
        }
    }
}
