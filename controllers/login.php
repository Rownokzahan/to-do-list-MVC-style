<?php

$config = require "../config.php";
$db = new Database($config);

if (!empty($_POST)) {
    $usernameOrEmail = $_POST["username-email"];
    $password = $_POST["password"];

    $user = $db->checkUser($usernameOrEmail);

    dd($user);
    if(!$user){
        dd("invalid user name or email");
    }
    elseif(!password_verify($_POST['password'], $user->password)){
        dd("invalid password");
    }else{
        header("Location: /");
    }
}

require_once "../views/login.view.php";
