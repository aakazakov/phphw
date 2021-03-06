<?php

declare(strict_types=1);

namespace app\controller;

use app\engine\App;
use app\controller\Controller;
use app\models\entities\Orders;

class OrdersController extends Controller
{
    public function actionIssue()
    {
        $session_id = session_id();
        session_regenerate_id();
        $user_name = App::call()->request->getParams()['user_name'];
        $user_email = App::call()->request->getParams()['user_email'];
        $anOrder = new Orders($user_name, $user_email, $session_id);
        App::call()->ordersRepository->save($anOrder);
        echo $this->render('orders');
    }

    public function actionStatus()
    {
        if (App::call()->usersRepository->isAdmin()) {
            $id = (int) App::call()->request->getParams()['id'];
            $anOrder = App::call()->ordersRepository->getOne($id);
            $anOrder->status = App::call()->request->getParams()['status'];
            App::call()->ordersRepository->save($anOrder);
            header("location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }

    public function actionAnOrder()
    {
        if (App::call()->usersRepository->isAdmin()) {
            $id = App::call()->request->getParams()['id'];
            $session_id = App::call()->ordersRepository->getWhere('id', $id)->session_id;
            $anOrder = App::call()->basketRepository->getAllWhere('session_id', $session_id);
            $goods = $this->getGoods($anOrder);
            echo $this->render('anOrder', ['goods' => $goods]);
        }
    }

    private function getGoods(array $order)
    {
        $goods_id = [];
        foreach ($order as $value) {
            $goods_id[] = $value['goods_id'];
        }
        $goods_id = implode(',', $goods_id);
        return App::call()->productRepository->getAllWhereIn('id', $goods_id);
    }
}
