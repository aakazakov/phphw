<?php

declare(strict_types=1);

namespace app\controller;

use app\engine\App;
use app\controller\Controller;

class ProductController extends Controller
{
    public function actionIndex() : void
    {
        echo $this->render('index');
    }

    public function actionCatalog() : void
    {
        $catalog = App::call()->productRepository->getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionCard() : void
    {
        $id = (int)App::call()->request->getParams()['id'];
        $product = App::call()->productRepository->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}
