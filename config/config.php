<?php

declare(strict_types=1);

use app\engine\Db;
use app\models\repositories\{
    BasketRepository,
    ProductRepository,
    UsersRepository,
    OrdersRepository
};
use app\engine\Request;

return [
    'root_dir' => __DIR__ . '/../',
    'templates_dir' => __DIR__ . '/../allTemplates/templates',
    'twig_templates_dir' => dirname(__DIR__) . '/../allTemplates/templatesTwig',
    'controller_namespace' => 'app\controller\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop_db',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'usersRepository' => [
            'class' => UsersRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ]
    ]
];

/*      == Old version ==
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATES_DIR', dirname(__DIR__) . "/allTemplates/templates/");
define('TWIG_TEMPLATES_DIR', dirname(__DIR__) . "/allTemplates/templatesTwig/");
define('CONTROLLER_NAMESPACE', "app\\controller\\");
*/
