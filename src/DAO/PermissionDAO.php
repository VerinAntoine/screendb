<?php
namespace App\DAO;

use App\Model\Permission;
use PDO;

class PermissionDAO extends DAO {

    public function __construct()
    {
        parent::__construct('permissions');
    }

    public function getPermissionsForUser(int $user)
    {
        $query = $this->pdo->prepare("SELECT * FROM users_permissions up JOIN permissions p ON up.permission = p.id WHERE up.user = :user");
        $query->execute(array(":user" => $user));
        return $query->fetchAll(PDO::FETCH_CLASS, Permission::class);
    } 

}