<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;
use app\engine\Request;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex() : void
    {
        echo $this->render('index');
    }

    public function actionCatalog() : void
    {
        $catalog = (new ProductRepository())->getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionCard() : void
    {
        $id = (int)(new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}
