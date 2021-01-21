<?php
namespace App\Model;

use \DateTime;

class Screen {

    private int $id;
    private string $name;
    private string $author;
    private string $url;
    private int $created_by;
    private string $created_at;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function getCreatedBy(): ?int //? Return User?
    {
        return $this->created_by;
    }

    public function setCreatedBy(int $id)
    {
        $this->createdBy = $id;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return new DateTime($this->createdAt);
    }
}