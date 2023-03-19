<?php
require_once __DIR__ . "./connect.php";
$query = "SELECT * FROM tasks ORDER BY id";
$statement = $pdo->query($query);
$tasks = $statement->fetchAll(PDO::FETCH_OBJ);

require_once __DIR__ . "./views/index.view.php";