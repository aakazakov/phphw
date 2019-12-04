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
        $orders = App::call()->ordersRepository->getAll();
        echo $this->render('admin', ['orders' => $orders]);
    }
}
