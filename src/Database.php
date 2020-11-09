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
        $config = require(dirname(__DIR__) . '/config.php');
        $this->pdo = new PDO("mysql:dbname=$config->db_name;host=$config->db_host", $config->db_user, $config->db_password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

}