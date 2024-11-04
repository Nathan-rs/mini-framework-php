<?php

use App\Controllers\TodoController\TodoController;
use App\Core\Router;

$todoController = new TodoController();

$route = new Router();

$route->get('/', [$todoController, 'index']);

$route->get('/{id}', [$todoController, 'findItem']);

$route->post('/', [$todoController, 'create']);

$route->put('/{id}', [$todoController, 'update']);

$route->delete('/{id}', [$todoController, 'delete']);

$route->resolve();
