<?php

use App\Controllers\TodoController\TodoController;
use App\Core\Router;

$todoController = new TodoController();

$route = new Router();

$route->get('/', [$todoController, 'index']);

$route->resolve();