<?php
namespace App\Model;

use \DateTime;

class Screen {

    private int $id;
    private string $name;
    private string $author;
    private string $url;
    private int $createdBy;
    private string $createdAt;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getCreatedBy(): ?int //? Return User?
    {
        return $this->createdBy;
    }

    public function getCreatedAt(): ?DateTime
    {
        return new DateTime($this->createdAt);
    }
}