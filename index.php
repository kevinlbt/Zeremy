<?php

session_start();

require './vendor/autoload.php';

require_once 'autoloader.php';

if (!isset($_GET['url'])) {
    $route = 'home';
}

if (isset($_GET['url']))
    $route = $_GET['url'];

$router = new Router($route);

$router->addAllRoutes();

$router->resolve();

