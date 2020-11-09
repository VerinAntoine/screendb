<?php
namespace App\Model;

use App\DAO\PermissionDAO;
use \DateTime;

class User {

    private int $id;
    private string $username;
    private string $password;
    private string $createdAt;
    private array $permissions;

    public function __construct()
    {
        $dao = new PermissionDAO();
        $this->permissions = $dao->getPermissionsForUser($this->id);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getCreatedAt(): ?DateTime
    {
        return new DateTime($this->createdAt);
    }

    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function hasPermission(array $perms): bool
    {
        $contains = false;
        foreach($this->permissions as $permission) {
            if(in_array($permission->getCode(), $perms)) {
                $contains = true;
            }
        }
        return $contains;
    }
}