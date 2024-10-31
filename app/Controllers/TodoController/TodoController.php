<?php

namespace App\Controllers\TodoController;

use App\Controllers\Controller;

class TodoController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('todos/index.html', ['message' => 'Hello World!']);
    }
}