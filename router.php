<?php

$routes = [
    '/' => "../controllers/index.php",
    '/create' => "../controllers/create.php",
    '/edit' => "../controllers/edit.php",
    '/delete' => "../controllers/delete.php",
    '/register' => "../controllers/register.php",
    '/login' => "../controllers/login.php",
    '/logout' => "../controllers/logout.php"
];

$uri = $_SERVER["REQUEST_URI"];
$parse_url = parse_url($uri);
$url_path = $parse_url["path"];

function routeToControllers($url_path, $routes)
{
    if (array_key_exists($url_path, $routes)) {
        require $routes[$url_path];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "../views/$code.view.php";
    die();
}

routeToControllers($url_path, $routes);
