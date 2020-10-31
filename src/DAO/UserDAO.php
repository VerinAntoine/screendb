<?php
namespace App\DAO;

use App\Model\User;
use PDO;

class UserDAO extends DAO {

    public function __construct()
    {
        parent::__construct('users');
    }

    public function findByUsername(string $username): User
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE username = :username");
        $query->execute(array(':username' => $username));
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $query->fetch();
    }

    public function findById(int $id): User
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(array(':id' => $id));
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $query->fetch();
    }

    public function findPasswordById(int $id): string
    {
        $query = $this->pdo->prepare("SELECT password FROM {$this->table} WHERE id = :id");
        $query->execute(array(":id" => $id));
        return $query->fetch();
    }

}
