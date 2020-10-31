<?php

use App\Database;

include dirname(__DIR__) . '/vendor/autoload.php';

$faker = Faker\Factory::create();
$pdo = Database::getInstance()->getPDO();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec("TRUNCATE TABLE screens");
$pdo->exec("TRUNCATE TABLE users");
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$users = [];
for($i = 0 ; $i < 5 ; $i++) {
    $pdo->exec("INSERT INTO users (username,password) VALUES ('$faker->userName','$faker->password')");
    $users[] = $pdo->lastInsertId();
}

$password = password_hash('pass', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO users (username,password) VALUES ('antoine','{$password}')");

for($i = 0 ; $i < 50 ; $i++) {
    $pdo->exec("INSERT INTO screens (name,author,url,created_by) VALUES ('{$faker->words(4, true)}','$faker->name','https://cdn.discordapp.com/attachments/482138498875260928/762774767212167208/H_au_point_ou_on_en_est_renoncer_a_alcool.PNG',{$faker->randomElement($users)})");
}
