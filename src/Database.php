<?php
namespace App;

use \PDO;

class Database {

    private static Database $instance;

    public static function getInstance(): Database
    {
        return isset($instance) ? $instance : $instance = new Database();
    }

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=screendb;host=127.0.0.1', 'antoine', 'password', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

}