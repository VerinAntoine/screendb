<?php
namespace App\DAO;

use App\Database;
use PDO;

class DAO {

    protected PDO $pdo;
    protected string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
        $this->pdo = Database::getInstance()->getPDO();
    }

    public function getCount(): int {
        $query = $this->pdo->prepare("SELECT count(id) FROM " . $this->table);
        $query->execute();
        return $query->fetch()[0];
    }

}