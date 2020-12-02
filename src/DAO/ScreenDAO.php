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

    public function selectLike(string $likeQ, string $likeA): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE name LIKE :likeQ AND author LIKE :likeA");
        $query->execute(array(":likeQ" => "%$likeQ%",
        		              ":likeA" => "%$likeA%"));
        return $query->fetchAll(PDO::FETCH_CLASS, Screen::class);
    }

    public function insert(Screen $screen)
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} (name, author, url, created_by) VALUES (:name, :author, :url, :created_by)");
        $query->execute(array(
            ":name" => $screen->getName(),
            ":author" => $screen->getAuthor(),
            ":url" => $screen->getUrl(),
            "created_by" => $screen->getCreatedBy()
        ));
    }

}
