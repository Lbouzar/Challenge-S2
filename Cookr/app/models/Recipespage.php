<?php 

namespace App\Models;

use App\Config\Sql;

class Recipespage extends Sql
{
    protected Int $id = 0;
    protected String $title;

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
}