<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;
use app\engine\App;

class AdminController extends Controller
{
    protected $defaultAction = 'panel';

    public function actionPanel()
    {
        $orders = array_reverse(App::call()->ordersRepository->getAll(), true);
        echo $this->render('admin', ['orders' => $orders]);
    }
}
