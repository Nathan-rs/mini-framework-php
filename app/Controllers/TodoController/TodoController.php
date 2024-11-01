<?php

namespace App\Controllers\TodoController;

use App\Controllers\Controller;
use App\Models\Todo\TodoModel;

class TodoController extends Controller
{

    private $todo;

    public function __construct()
    {
        parent::__construct();
        $this->todo = new TodoModel();
    }

    public function index()
    {
        $todos = $this->todo::getAll();
        $this->view->render('todos/index.twig.php', ['title' => 'Todos', 'todos' => $todos]);
    }

    public function create()
    {

        $this->todo->setTitle($_POST['title']);
        $this->todo->setDescription($_POST['description']);
        $this->todo->setIsFinished(false);

        if ($this->todo->save()) {
            $this->view->render('todos/index.twig.php', ['messageErro' => '']);
        } else {
            $this->view->render('todos/index.twig.php', ['messageErro' => 'Erro ao salvar a task']);
        }
    }

    public function delete($id)
    {
        $todo = $this->todo::find($id);

        if($todo->delete()) {
            $this->view->render('todos/index.twig.php');
        } else {
            $this->view->render('todos/index.twig.php', ['messageErro' => 'Erro ao deletar a task: ' . $todo->getId()]);
        }
    }
}
