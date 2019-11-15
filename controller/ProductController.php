<?php

declare(strict_types=1);

namespace app\controller;

use app\models\Product;

class ProductController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

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

    public function render($templateName, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate( "layouts/{$this->layout}", [
                    'menu' => $this->renderTemplate('menu'),
                    'content' => $this->renderTemplate($templateName, $params)
                ]
            );
        } else {
            return $this->renderTemplate($templateName, $params = []);
        }
    }

    public function renderTemplate($templateName, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $templateName . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $catalog = Product::getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionCard()
    {
        $id = (int) $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}
