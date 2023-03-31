<?php

$config = require "../config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $usernameOrEmail = $_POST["username-email"];
    $password = $_POST["password"];

    $error_message = '';

    if (empty($usernameOrEmail)) {
        $error_message = 'Please enter username/email';
    }

    if (empty($password)) {
        $error_message = 'Please enter password';
    }

    $user = $db->findUser($usernameOrEmail);

    if (empty($error_message) && !$user) {
        $error_message = 'Wrong user name or email';
    }

    if (empty($error_message) && !password_verify($password, $user->password)) {
        $error_message = 'Wrong Password';
    }

    if (!empty($error_message)) {
        $_SESSION['login_error_message'] = $error_message;
    } else {
        $_SESSION['is_user_logged_in'] = true;
        $_SESSION['logged_in_user_name'] = $user->name;

        header("Location: /");
    }
}

require_once "../views/login.view.php";
