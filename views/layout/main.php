<?php
$auth = new App\Auth();
if(!$auth->isLogged()) {
    http_response_code(403);
    header('Location: ' . $router->url('login'));
    exit();
}

$admin = $auth->getUser()->hasPermission(array("admin"));

$scripts[] = "/assets/js/layout.js";
?>

<!-- Nav bar -->
<nav class="top-0 sticky bg-gray-800 py-3 px-5 text-white inline-flex w-full">
    <a href="<?= $router->url('screens') ?>" class="">ScreenDb</a>
    <div class="ml-auto dropdown relative" onmouseover="dropdownShow(this)" onmouseout="dropdownHide(this)" data-toggle="nav-dropdown">
        <button data-toggle="dropdown">Bonjour, <?= $auth->getUser()->getUsername() ?> &DownArrow;</button>
        <ul class="hidden absolute text-black bg-white py-2 px-3 w-48 shadow-2xl rounded-lg right-0" id="nav-dropdown">
            <?php if($admin === true): ?>
            <li class="py-1 text-gray-800 hover:text-red-500"><a href="<?= $router->url('admin') ?>">Administration</a></li>
            <?php endif ?>
            <li class="py-1 text-gray-800 hover:text-gray-600"><a href="<?= $router->url('logout') ?>">Se déconnecter</a></li>
        </ul>
    </div>
</nav>
<div class="container m-2">
    <?= $content ?>
</div>