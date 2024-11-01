<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class TodoModel
{
    private $id;
    private $title;
    private $description;
    private $isFinished = false;

    private $db;

    public function __construct($title = "", $description = "", $isFinished = false)
    {
        $this->title = $title;
        $this->description = $description;
        $this->isFinished = $isFinished;

        $this->db = (new Database())->getConnection();
    }

    public function save()
    {
        if ($this->id) {
            //Atualiza a task existente
            $sql = "UPDATE todos SET title = :title, description = :description, is_finished = :isFinished WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                ':title' => $this->title,
                ':description' => $this->description,
                ':isFinished' => $this->isFinished,
                ':id' => $this->id
            ]);
        } else {
            //Insere uma nova task
            $sql = "INSERT INTO todos (title, description, isFinished) VALUES (:title, :description, :isFinished)";
            $stmt = $this->db->prepare($sql);

            $resultInsert = $stmt->execute([
                ':title'  => $this->title,
                ':description' => $this->description,
                ':isFinished' => $this->isFinished ? true : false
            ]);

            if ($resultInsert) {
                $this->id = $this->db->lastInsertId();
                return true;
            }

            return false;
        }
    }

    public static function getAll() {
        $db = (new Database())->getConnection();
        $sql = "SELECT * FROM todos";
        $stmt = $db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function find($id) {
        $db = (new Database())->getConnection();
        $sql = "SELECT * FROM todos WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetchObject(self::class);
    }

    public function delete() {
        if($this->id) {
            $sql = "DELETE FROM todos WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            return $stmt->execute([':id' => $this->id]);
        }
        return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function isFinished()
    {
        return $this->isFinished;
    }

    public function setFinished($isFinished)
    {
        $this->isFinished = $isFinished;
    }
}
