<?php
namespace App\Model;

use DateTime;

class Permission {

    private int $id;
    private string $name;
    private string $code;
    private string $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getCreatedAt(): ?DateTime
    {
        return new DateTime($this->createdAt);
    }
}