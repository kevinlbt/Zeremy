<?php

session_start();

require_once 'autoloader.php';

if (isset($_GET['url']))
    $route = $_GET['url'];


if ($route === 'index.php') {
    $route = 'login';
}

$router = new Router($route);

$router->addAllRoutes();

$router->resolve();

