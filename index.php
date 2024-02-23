<?php

require_once __DIR__.'/vendor/autoload.php';

use app\core\Router;
use app\controller\Controller;
use app\core\Middleware;

$router = new Router();
$controller = new Controller();
$middleware = new Middleware();

$router->get('/form', function($ctx){
    $ctx->blade('Form');
});

$router->get('/signup', function($ctx){
    $role = $ctx->params("role");
    $ctx->blade('Signup', ["role"=> $role]);
}, [$middleware, 'Log']);

$router->get('/login', function($ctx){
    $role = $ctx->params("role");
    $ctx->blade('Login', ["role"=> $role]);
}, [$middleware, 'Log']);

$router->post('/signup', [$controller, 'Signup']);
$router->post('/login', [$controller, 'Login']);

    

$router->start();