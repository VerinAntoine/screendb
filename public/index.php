<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . '/views/');
$router
    ->getAndPost('/login', 'auth/login.php', 'login')
    ->get('/logout', 'auth/logout.php', 'logout')
    ->get('/screens', 'screens/index.php', 'screens')
    ->run();
