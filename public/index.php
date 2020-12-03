<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . '/views/');
$router
    ->get('/', '', 'root')
    ->getAndPost('/login', 'auth/login.php', 'login')
    ->get('/logout', 'auth/logout.php', 'logout')
    ->get('/screens', 'screens/index.php', 'screens')
    ->getAndPost('/screens/add', 'screens/add.php', 'screens-add')
    ->get('/admin', 'admin/index.php', 'admin')
    ->run();
