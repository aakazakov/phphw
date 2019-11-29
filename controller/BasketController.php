<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;
use app\engine\Request;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;

class BasketController  extends Controller
{
    protected $defaultAction = 'orders';

    public function actionAddToBasket() : void
    {
        $id = (new Request)->getParams()['id'];
        $basket = new Basket(session_id(), (int)$id);
        (new BasketRepository())->save($basket);
        header('Content-Type: application/json');
        echo json_encode([
                'response' => 'ok',
                'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
            ]);
        die();
    }

    public function actionDeleteFromBasket() : void
    {
        $id = (int)(new Request)->getParams()['id'];
        $sessionId = session_id();
        $basket = (new BasketRepository())->getOne($id);
        if ($sessionId === $basket->session_id) {
            (new BasketRepository())->doDelete($basket);
        }
        header('Content-Type: application/json');
        echo json_encode([
                'response' => 'ok',
                'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
            ]);
        die();
    }

    public function actionOrders() : void
    {
        $basket = (new BasketRepository())->getBasket(session_id());
        echo $this->render('basket', ['products' => $basket]);
    }
}
