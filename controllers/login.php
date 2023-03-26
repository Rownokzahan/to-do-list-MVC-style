<?php

$config = require "../config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $isUser = $db->checkUser($username, $password);

    if ($isUser) {
        header("Location: /");
    } else {
        echo "Invalid username or password";
    }
}

require_once "../views/login.view.php";
