<?php
$config = require "../config.php";
$db = new Database($config);

$id = $_GET["id"];
$db->deleteTask($id);

header('location: /');