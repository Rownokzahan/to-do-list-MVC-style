<?php

class Database
{
    public $pdo;

    public function __construct($config)
    {
        // dsn = data source name
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        $this->pdo = new PDO($dsn, $config['username'], $config['password']);
    }

    public function query($query, $params = [])
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);

        $tasks = $statement->fetchAll(PDO::FETCH_OBJ);

        dd($tasks);
    }

    public function allTask()
    {
        $query = "SELECT * FROM tasks ORDER BY id";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_OBJ);
        return $tasks;
    }

    public function createTask($name, $img_path, $deadline)
    {
        try {
            $query = "INSERT INTO tasks (name ,attachment, deadline) VALUES (:name, :attachment, :deadline)";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue('name', $name);
            $statement->bindValue('attachment', $img_path);
            $statement->bindValue('deadline', $deadline);
            $statement->execute();

            return;
        } catch (PDOException $e) {
            echo "Insertion failed: " . $e->getMessage();
            die();
        }
    }

    public function getTask($id)
    {
        try {
            $query = "SELECT * FROM tasks WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue('id', $id);
            $statement->execute();

            $task = $statement->fetch(PDO::FETCH_OBJ);
            return $task;
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            die();
        }
    }

    public function updateTask($name, $img_path, $deadline, $status, $id)
    {
        try {
            $query = "UPDATE tasks SET name = :name, attachment = :attachment, deadline = :deadline, status = :status WHERE id= :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue('name', $name);
            $statement->bindValue('attachment', $img_path);
            $statement->bindValue('deadline', $deadline);
            $statement->bindValue('status', $status);
            $statement->bindValue('id', $id);
            $statement->execute();

            var_dump($statement);
            return;
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            die();
        }
    }
}
