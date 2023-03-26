<?php

$config = require "../config.php";
$db = new Database($config);

$tasks = $db->allTask();
require_once "../views/index.view.php";