<?php

declare(strict_types=1);

namespace app\controller;

use app\models\Product;
use app\controller\Controller;

class ProductController extends Controller
{
    protected $defaultAction = 'index';
    
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
