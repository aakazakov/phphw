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
        $user_name = App::call()->request->getParams()['user_name'];
        $user_email = App::call()->request->getParams()['user_email'];
        $anOrder = new Orders($user_name, $user_email, session_id());
        App::call()->ordersRepository->save($anOrder);
        echo $this->render('orders');
    }
}
