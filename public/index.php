<?php

use App\Application;
use Controllers\ElasticController;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', function () {
    return "hai";
});
$app->router->get('/home', 'home');
$app->router->get('/store', [ElasticController::class, 'create']);
$app->router->get('/get', [ElasticController::class, 'get']);
$app->router->get('/search', [ElasticController::class, 'search']);
$app->router->get('/delete', [ElasticController::class, 'delete']);
$app->router->get('/delete-index', [ElasticController::class, 'deleteIndex']);
$app->router->get('/create-index', [ElasticController::class, 'createIndex']);


$app->run();



