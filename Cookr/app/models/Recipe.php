<?php

namespace App\Models;

use App\Config\Sql;

class Recipe extends Sql
{
    protected Int $id;
    protected String $title;
    protected String $description;
    protected String $difficulty;
    protected Int $duration;
    protected Int $recipeCategory;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return String 
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param String $title
     */
    public function setTitle(string $title): void
    {
        $this->title = ucfirst(strtolower(trim($title)));
    }

    /**
     * @return String
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription(string $description): void
    {
        $this->description = trim($description);
    }

    /**
     * @return String
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * @param String $difficulty
     */
    public function setDifficulty(string $difficulty): void
    {
        $this->description = $difficulty;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getRecipeCategory(): int
    {
        return $this->recipeCategory;
    }

    /**
     * @param int $recipeCategory
     */
    public function setRecipeCategory(int $recipeCategory): void
    {
        $this->recipeCategory = $recipeCategory;
    }
}
