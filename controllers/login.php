<?php

$config = require "../config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $usernameOrEmail = $_POST["username-email"];
    $password = $_POST["password"];

    $error_message = '';

    if (empty($_POST['username_or_email'])) {
        $error_message = 'Please enter username/email';
    } elseif (empty($_POST['password'])) {
        $error_message = 'Please enter password';
    } else {
        $user = $db->findUser($usernameOrEmail);

        if (!$user) {
            $error_message = 'Wrong user name or email';
        }
        // elseif(!password_verify($password, $user->password)){
        elseif ($password !== $user->password) {
            $error_message = 'Wrong Password';
        } else {
            $_SESSION['is_user_logged_in'] = true;
            $_SESSION['logged_in_user_name'] = $user->name;

            header("Location: /");
        }
    }

    $_SESSION['login_error_message'] = $error_message;
}


require_once "../views/login.view.php";
