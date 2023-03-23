<?php

$config = require "config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $name = $_POST["name"];
    $deadline = $_POST["deadline"];

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

    $db->createTask($name, $img_path, $deadline);

    header("Location: /");
}

require_once __DIR__ . "./../views/create.view.php";
