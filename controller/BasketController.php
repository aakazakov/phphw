<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;

class BasketController  extends Controller
{
    protected $defaultAction = 'emptyBasket';
    
    public function actionEmptyBasket() : void
    {
        echo $this->render('emptyBasket');
    }

    public function actionOrders() : void
    {
        echo $this->render('basket');
    }
}
