<?php

declare(strict_types=1);

namespace app\controller;

use app\models\Product;
use app\controller\Controller;
use app\engine\Request;

class ProductController extends Controller
{
    public function actionIndex() : void
    {
        echo $this->render('index');
    }

    public function actionCatalog() : void
    {
        $catalog = Product::getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionCard() : void
    {
        $id = (int)(new Request)->getParams()['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}
