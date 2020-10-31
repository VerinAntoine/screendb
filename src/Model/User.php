<?php
namespace App\Model;

use \DateTime;

class User {

    private int $id;
    private string $username;
    private string $password;
    private string $createdAt;

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
}