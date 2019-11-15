<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;

class BasketController  extends Controller
{
    protected $defaultAction = 'emptyBasket';
    
    public function actionEmptyBasket()
    {
        echo $this->render('basket');
        echo 'Ваша корзина пуста';
    }

    public function actionOrders()
    {
        echo $this->render('basket');
        echo 'Ваши заказы:';
    }
}
