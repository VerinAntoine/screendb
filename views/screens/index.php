<?php

use App\DAO\ScreenDAO;

$scripts[] = '/assets/screens.js';

$dao = new ScreenDAO();

if(empty($_GET) || empty($_GET['q']))
    $screens = $dao->selectAll();
else{
    $screens = $dao->selectLike($_GET['q']);
}
?>

<div class="flex my-3 mx-4 items-center">
    <i class="fas fa-search"></i>
    <form method="get">
        <input class="w-full ml-3 focus:outline-none" name="q" type="text" placeholder="Rechercher.." autocomplete="off">
    </form>
</div>


<div class="grid lg:grid-cols-3 gap-6">
    <?php foreach($screens as $screen): ?>
    <div class="bg-white border border-gray-400 rounded">
        <div class="flex flex-col bg-gray-700 items-center">
            <img src="<?= $screen->getUrl() ?>" alt="" />
        </div>
        <div class="m-2 flex">
            <div>
                <span class="text-purple-600 font-bold"><?= $screen->getName() ?></span>
                <span class="text-sm text-gray-600">de</span>
                <span><?= $screen->getAuthor() ?></span>
            </div>
            <div class="flex ml-auto">
                <button class="ml-auto bg-purple-500 hover:bg-purple-400 text-white border-b-4 border-purple-600 hover:border-purple-500 focus:bg-green-600 focus:border-green-500 focus:outline-none py-1 px-4 rounded" onclick="copy('<?= $screen->getUrl() ?>')">Copier</button>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>