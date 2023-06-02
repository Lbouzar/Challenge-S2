<?php

namespace App\Models;

use App\Config\Sql;

class CommentRecipe extends Sql
{
    protected Int $user_id;
    protected Int $recipe_id;
    protected String $comment;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserid(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getRecipeId(): int
    {
        return $this->recipe_id;
    }

    /**
     * @param int $recipe_id
     */
    public function setRecipeId(int $recipe_id): void
    {
        $this->recipe_id = $recipe_id;
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
