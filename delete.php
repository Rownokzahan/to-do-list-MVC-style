<?php
require_once __DIR__ . "./connect.php";
$id = $_GET["id"];


$query = "DELETE FROM tasks WHERE id = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);

header('location: ./index.php');