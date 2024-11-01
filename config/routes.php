<?php

use App\Controllers\TodoController\TodoController;
use App\Core\Router;

$todoController = new TodoController();

$route = new Router();

$route->get('/', [$todoController, 'index']);
$route->get('/item/{id}', function ($id) {
    echo 'Rota GET ITEM com id: ' . $id;
});
$route->delete('/delete/{id}', [$todoController, 'delete']);

$route->resolve();
