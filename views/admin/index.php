<?php

use App\DAO\ScreenDAO;

$layout = '/admin/layout.php';
$currentPage = 'dashboard';

$usersDAO = new \App\DAO\UserDAO();
$screensDAO = new ScreenDAO();
?>

<div class="flex flex-row w-full mt-10">
    <div class="p-5 mx-2 bg-gray-200 rounded w-full">
        <h2 class="text-xl">Utilisateurs</h2>
        <h3 class="text-gray-600"><?= $usersDAO->getCount() ?></h3>
    </div>
    <div class="p-5 mx-2 bg-gray-200 rounded w-full">
        <h2 class="text-xl">Screens</h2>
        <h3 class="text-gray-600"><?= $screensDAO->getCount() ?></h3>
    </div>
    <div class="p-5 mx-2 bg-gray-200 rounded w-full">
        <h2 class="text-xl">Tortues?</h2>
        <h3 class="text-gray-600">1</h3>
    </div>
</div>
