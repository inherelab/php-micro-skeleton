<?php
/**
 * @var Inhere\Route\ORouter $router
 */

use App\Http\Controller\HomeController;
use App\Http\Controller\ErrorController;
use App\Http\Controller\TestController;

$router = \Mco::$di->get('router');

$router->get('/', HomeController::class . '@index');
$router->get('/routes', HomeController::class . '@routes');

$router->get('/home[/{act}]', HomeController::class);
$router->get('/test[/{act}]', TestController::class);

$router->ctrl('/apidocs', \Mco\Http\Controllers\ApiDocController::class, [
    '' => 'get',
    'gen' => 'get',
]);
$router->rest('/rest', \App\Http\Controller\RestController::class);

$router->get('/404', ErrorController::class . '@notFound');
$router->get('/405', ErrorController::class . '@notAllowed');
$router->get('/500', ErrorController::class . '@error');
