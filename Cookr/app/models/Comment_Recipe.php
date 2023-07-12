<?php

namespace App\Models;

use App\Config\Sql;

class Comment_Recipe extends Sql
{
    protected String $user;
    protected String $recipe;
    protected String $comment;

    public function getUserId(): string
    {
        return $this->user;
    }

    public function setUserid(string $user): void
    {
        $this->user = "'".$user."'";
    }


    public function getRecipeId(): string
    {
        return $this->recipe;
    }

    public function setRecipeId(string $recipe): void
    {
        $this->recipe = "'".$recipe."'";
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setDescription(string $comment): void
    {
        $this->comment = trim($comment);
    }
}
