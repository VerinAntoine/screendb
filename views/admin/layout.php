<?php
$auth = new App\Auth();

if($auth->getUser()->hasPermission(array("admin")) === false) {
    http_response_code(403);
    header('Location: ' . $router->url('screens'));
    exit();
}

?>

<div class="flex">
    <nav class="w-1/4 h-screen bg-gray-300 p-5">
        <h1 class="pl-5 pb-3 mt-2 text-xl border-b border-gray-400">Screen<span class="text-red-600 font-bold">Admin</span></h1>
        <div class="mt-8 flex flex-col">
            <a href="<?= $router->url('admin') ?>" class="my-1 p-2 rounded hover:bg-gray-200 <?= $currentPage === 'dashboard' ? "bg-gray-400" : ""?>">
                <i class="fas fa-chart-bar"></i>
                Dashboard
            </a>
            <a href="#" class="my-1 p-2 rounded hover:bg-gray-200 <?= $currentPage === 'users' ? "bg-gray-400" : ""?>">
                <i class="fas fa-users"></i>
                Utilisateurs
            </a>
            <a href="<?= $router->url('admin-screens') ?>" class="my-1 p-2 rounded hover:bg-gray-200 <?= $currentPage === 'screens' ? "bg-gray-400" : ""?>">
                <i class="fas fa-lemon"></i>
                Screens
            </a>
        </div>
    </nav>
    <div class="w-full m-3">
        <?= $content ?>
    </div>
</div>
