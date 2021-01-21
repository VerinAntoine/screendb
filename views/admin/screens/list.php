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
            <tr class="border-t border-gray-300">
                <td class="py-4"><?= $screens->getId() ?></td>
                <td><?= $screens->getName() ?></td>
                <td><?= $screens->getAuthor() ?></td>
                <td><?= $usersDAO->findById($screens->getCreatedBy())->getUsername() ?></td>
                <td>
                    <a href="#" class="bg-blue-700 text-white p-2 rounded hover:bg-blue-600"><i class="fas fa-edit"></i></a>
                    <a href="<?= $router->url('admin-screens-delete', array("id" => $screens->getId())) ?>" class="bg-red-700 text-white p-2 rounded hover:bg-red-600"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>