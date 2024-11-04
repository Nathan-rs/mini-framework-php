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
        $this->view->render('todos.index', ['title' => 'Todos', 'todos' => $todos]);
    }

    public function findItem($id)
    {
        $todo = $this->todo::getItem($id);
        $this->view->render('todos.index', ['todos' => $todo]);
    }

    public function create()
    {
        $this->todo->setTitle($_POST['description']);
        $this->todo->setDescription($_POST['description']);
        $this->todo->setIsFinished(false);

        if ($this->todo->save()) {
            $this->view->redirect('/');
        } else {
            $this->view->render('todos.index', ['messageErro' => 'Erro ao salvar a task']);
        }

        return $this->view->render('todos.index', ['messageErro' => 'Erro ao salvar a task! parametros errados']);
    }

    public function update($id)
    {
        $todo = $this->todo::find($id);

        if ($todo->update(['isFinished' => 0, 'description' => 'Task atualizada'])) {
            $this->view->redirect('/');
        } else {
            $this->view->render('todos.index', ['messageErro' => 'Erro ao atualizar a task: ' . $todo->getId()]);
        }
    }

    public function delete($id)
    {
        $todo = $this->todo::find($id);

        if ($todo && $todo->delete()) {
            // $this->view->render('todos.index', ['messageErro' => 'Elemento deletado com sucesso: ' . $todo->getId()]);
            echo json_encode(['status' => 'success', 'message' => 'Elemento deletado com sucesso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao deletar a task.']);
            // $this->view->render('todos.index', ['messageErro' => 'Erro ao deletar a task: ' . $todo->getId()]);
        }
    }
}
