<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;
use app\engine\Request;
use app\models\Basket;

class BasketController  extends Controller
{
    protected $defaultAction = 'emptyBasket';
    
    public function actionEmptyBasket() : void
    {
        echo $this->render('emptyBasket');
    }

    public function actionAddToBasket() : void
    {
        $id = (new Request)->getParams()['id'];
        (new Basket((int)session_id(), (int)$id))->save();
        echo json_encode(['response' => 'ok', 'id' => $id]);
        die();
    }

    public function actionOrders() : void
    {
        echo $this->render('basket');
    }
}
