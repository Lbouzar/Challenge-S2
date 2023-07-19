<?php

namespace App\Models;

use App\Config\Sql;

class Comment_Recipe extends Sql
{
    protected String $id = " ";
    protected String $creator;
    protected String $recipe;
    protected String $comment;
    protected Int $is_valid;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(String $id): void 
    {
        $this->id = $id;
    }

    public function getCreator(): string
    {
        return $this->creator;
    }

    public function setCreator(string $creator): void
    {
        $this->creator = $creator;
    }


    public function getRecipe(): string
    {
        return $this->recipe;
    }

    public function setRecipe(string $recipe): void
    {
        $this->recipe = $recipe;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setDescription(string $comment): void
    {
        $this->comment = trim($comment);
    }

    public function getValid(): int
    {
        return $this->is_valid;
    }

    public function setValid(int $is_valid): void
    {
        $this->is_valid = $is_valid;
    }
}
