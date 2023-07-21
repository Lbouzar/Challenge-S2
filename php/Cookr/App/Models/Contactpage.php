<?php 

namespace App\Models;

use App\Config\Sql;

class Contactpage extends Sql
{
    protected Int $id = 0;
    protected String $title;
    protected String $content;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void 
    {
        $this->title = trim($title);
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void 
    {
        $this->content = trim($content);
    }
}