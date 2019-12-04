<?php

declare(strict_types=1);

namespace app\controller;

use app\controller\Controller;

class AdminController extends Controller
{
    protected $defaultAction = 'panel';

    public function actionPanel()
    {
        echo $this->render('admin');
    }
}
