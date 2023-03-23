<?php

$config = require "config.php";
$db = new Database($config);

$tasks = $db->allTask();
require_once __DIR__ . "./../views/index.view.php";