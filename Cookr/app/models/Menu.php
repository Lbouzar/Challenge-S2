<?php

namespace App\Models;

use App\Config\Sql;

class Menu extends Sql
{
    protected Int $id = 0;
    protected String $content;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
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