<?php

$config = require "../config.php";
$db = new Database($config);

if (!empty($_GET)) {
    $id = $_GET["id"];
    $task = $db->getTask($id);
}

if (!empty($_POST)) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $deadline = $_POST["deadline"];
    $status = $_POST["status"];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    if (!is_dir('images')) {
        mkdir('images');
    }

    if (!is_dir('images/uploads')) {
        mkdir('images/uploads');
    }

    $directory = 'images/uploads/';
    $img_name = uniqid() . '_' . str_replace(" ", "_", $file_name);
    $img_path = $directory . $img_name;

    move_uploaded_file($file_tmp, $img_path);

    $db->updateTask($name, $img_path, $deadline, $status, $id);

    header("Location: /");
}

require_once '../views/edit.view.php';
