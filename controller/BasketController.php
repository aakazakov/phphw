<?php

declare(strict_types=1);

namespace app\controller;

use app\engine\App;
use app\controller\Controller;
use app\models\entities\Basket;

class BasketController  extends Controller
{
    protected $defaultAction = 'orders';

    public function actionAddToBasket() : void
    {
        $id = App::call()->request->getParams()['id'];
        $basket = new Basket(session_id(), (int)$id);
        App::call()->basketRepository->save($basket);
        header('Content-Type: application/json');
        echo json_encode([
                'response' => 'ok',
                'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
            ]);
        die();
    }

    public function actionDeleteFromBasket() : void
    {
        $id = (int)App::call()->request->getParams()['id'];
        $sessionId = session_id();
        $basket = App::call()->basketRepository->getOne($id);
        if ($sessionId === $basket->session_id) {
            App::call()->basketRepository->doDelete($basket);
        }
        header('Content-Type: application/json');
        echo json_encode([
                'response' => 'ok',
                'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
            ]);
        die();
    }

    public function actionOrders() : void
    {
        $basket = App::call()->basketRepository->getBasket(session_id());
        echo $this->render('basket', ['products' => $basket]);
    }
}
