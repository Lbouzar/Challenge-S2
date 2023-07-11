<?php

namespace App\Models;

use App\Config\Sql;

class Comment_Recipe extends Sql
{
    protected String $user;
    protected String $recipe;
    protected String $comment;

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUserid(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getRecipeId(): string
    {
        return $this->recipe;
    }

    /**
     * @param string $recipe
     */
    public function setRecipeId(string $recipe): void
    {
        $this->recipe = $recipe;
    }

    /**
     * @return String
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param String $comment
     */
    public function setDescription(string $comment): void
    {
        $this->comment = trim($comment);
    }
}
