<?php
$config = require "../config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $db->createUser($username, $email, $password);

    header("Location: /login");
}

require_once "../views/register.view.php";
