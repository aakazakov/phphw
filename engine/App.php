<?php

declare(strict_types=1);

namespace app\engine;

use app\traits\TSingletone;
use ReflectionClass;
use app\engine\Render;

class App
{
    use TSingletone;

    public $config;
    private $components;
    private $controller;
    private $actionName;

    public static function call()
    {
        return static::getInstance();
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage;
        $this->runController();
    }

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->actionName = $this->request->getActionName();
        $controllerClass = $this->config['controller_namespace'] . ucfirst($this->controller) . 'Controller';
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render());
            $controller->runAction($this->actionName);
        }
    }

    function __get($name)
    {
        return $this->components->get($name);
    }

    /*      == Old version ==
    public static function Run() : void
    {
        $controllerName = empty((new Request())->getControllerName()) ? 'product' : (new Request())->getControllerName();
        $actionName = empty((new Request())->getActionName()) ? '' : (new Request())->getActionName();
        $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render);
            $controller->runAction($actionName);
        }
    }
    */
}
