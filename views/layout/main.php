<!-- Nav bar -->
<nav class="top-0 sticky bg-gray-800 py-3 px-5 text-white inline-flex w-full">
    <a href="<?= $router->url('screens') ?>" class="">ScreenDb</a>
    <div class="flex-auto flex items-center border-b-2 border-gray-600 mx-6">
        <i class="fas fa-search"></i>
        <input class="w-full bg-gray-800 pl-3 focus:outline-none" name="search" type="text" placeholder="Rechercher..">
    </div>
    <a href="<?= $router->url('logout'); ?>" class="text-purple-300 hover:text-purple-500">Se déconnecter</a>
</nav>
<div class="container m-2">
    <?php
    $auth = new App\Auth();
    if(!$auth->isLogged()) {
        http_response_code(403);
        header('Location: ' . $router->url('login'));
        exit();
    }
    ?>
    <?= $content ?>
</div>