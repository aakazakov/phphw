<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;

class OrdersController extends Controller
{
    public function actionIssue()
    {
        echo $this->render('orders');
    }
}
