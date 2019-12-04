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
        $id = (int) App::call()->request->getParams()['id'];
        $anOrder = App::call()->ordersRepository->getOne($id);
        $anOrder->status = App::call()->request->getParams()['status'];
        App::call()->ordersRepository->save($anOrder);
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    public function actionAnOrder()
    {
        $session_id = App::call()->request->getParams()['sid'];
        // FIXME getWhere не поджходит - возвращает объект (??)
        $anOrder = App::call()->basketRepository->getWhere('session_id', $session_id);
        echo $this->render('anOrder');
        var_dump($anOrder);
    }
}
