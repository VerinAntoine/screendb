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

    // Admin routes
    ->get('/admin', 'admin/index.php', 'admin')
    ->get('/admin/screens', 'admin//screens/list.php', 'admin-screens')
    ->get('/admin/screens/[i:id]/delete', 'admin/screens/delete.php', 'admin-screens-delete')
    ->run();
