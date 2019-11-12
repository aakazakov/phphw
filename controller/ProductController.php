<?php

declare(strict_types=1);

namespace app\controller;

class ProductController
{
    private $action;
    private $defaultAction = 'index';

    public function runAction($action = null)
    {
        $this->action = $action ? : $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo 'Bad news: 404 (no action)';
        } 
    }

    public function actionIndex()
    {
        echo 'Ok';
    }

    public function actionCard()
    {

    }
}