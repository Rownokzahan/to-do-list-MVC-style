<?php
$config = require "../config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $error_message = '';
    if (empty($username)) {
        $error_message = 'Please enter username';
    }
    if (empty($email)) {
        $error_message = 'Please enter email';
    }
    if (empty($password)) {
        $error_message = 'Please enter password';
    }
    if ($db->findEmail($email)) {
        $error_message = 'Email already exists';
    }

    if (!empty($error_message)) {
        $_SESSION['signup_error_message'] = $error_message;
    } else {
        $db->createUser($username, $email, $password);

        header("Location: /login");
    }
}

require_once "../views/register.view.php";
