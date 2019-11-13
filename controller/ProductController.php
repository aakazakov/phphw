<?php

declare(strict_types=1);

namespace app\controller;

use app\models\Product;

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

    public function renderTemplate($templateName)
    {
        ob_start;
        $templatePath = TEMPLATES_DIR . $templateName . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean;       
    }

    public function actionIndex()
    {
        include '../templates/catalog.php';
    }

    public function actionCard()
    {
        $id = (int) $_GET['id'];
        $product = Product::getOne($id);
        include '../templates/card.php';
    }
}
