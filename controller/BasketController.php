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
        (new Basket(session_id(), (int)$id))->save();
        header('Content-Type: application/json');
        echo json_encode([
                'response' => 'ok',
                'count' => Basket::getCountWhere('session_id', session_id())
            ]);
        die();
    }

    public function actionOrders() : void
    {
        $basket = Basket::getBasket(session_id());
        echo $this->render('basket', ['products' => $basket]);
    }
}
