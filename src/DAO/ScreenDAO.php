<?php
namespace App\DAO;

use App\Model\Screen;
use PDO;

class ScreenDAO extends DAO {

    function __construct()
    {
        parent::__construct('screens');
    }

    public function selectAll(): array
    {
        $query = $this->pdo->query("SELECT * FROM {$this->table}");
        return $query->fetchAll(PDO::FETCH_CLASS, Screen::class);
    }

    public function selectLike(string $like): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE name LIKE :like");
        $query->execute(array(":like" => "%$like%"));
        return $query->fetchAll(PDO::FETCH_CLASS, Screen::class);
    }

}
