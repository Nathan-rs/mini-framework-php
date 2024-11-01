<?php

namespace App\Controllers\TodoController;

use App\Controllers\Controller;
use App\Models\TodoModel;

class TodoController extends Controller {

    private $todo;

    public function __construct() {
        parent::__construct();
        $this->todo = new TodoModel();
    }

    public function index() {
        $todos = $this->todo::getAll();
        $this->view->render('todos/index.twig.php', ['title' => 'Todos','todos' => $todos]);
    }
}