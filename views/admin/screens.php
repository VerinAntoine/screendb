<?php

use App\DAO\ScreenDAO;
use App\DAO\UserDAO;

$layout = '/admin/layout.php';
$currentPage = 'screens';

$screenDAO = new ScreenDAO();
$usersDAO = new UserDAO();
?>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Autheur</th>
            <th>Par</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($screenDAO->selectAll() as $screens): ?>
            <tr class="border-t border-gray-300 mt-10">
                <td class="my-10"><?= $screens->getId() ?></td>
                <td><?= $screens->getName() ?></td>
                <td><?= $screens->getAuthor() ?></td>
                <td><?= $usersDAO->findById($screens->getCreatedBy())->getUsername() ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>