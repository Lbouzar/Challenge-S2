<?php

namespace App\Models;

use App\Config\Sql;

class Recipe extends Sql
{
    protected String $id;
    protected String $title;
    protected String $description; //Les étapes de la recette
    protected String $difficulty;
    protected Int $isMain = 0;
    protected String $category;
    protected String $presentation;
    protected Int $preparationTime = 0;
    protected Int $cookingTime = 0;
    protected Int $price = 0;
    protected String $ingredients;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param String $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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

    public function getIsMain(): int
    {
        return $this->isMain;
    }

    public function setIsMain(int $isMain): void
    {
        $this->isMain = $isMain;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getPresentation(): string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): void
    {
        $this->presentation = $presentation;
    }

    public function getPreparationTime(): int
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(int $preparationTime): void
    {
        $this->preparationTime = $preparationTime;
    }

    public function getCookingTime(): int 
    {
        return $this->cookingTime;
    }

    public function setCookingTime(int $cookingTime): void 
    {
        $this->cookingTime = $cookingTime;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): void 
    {
        $this->ingredients = '{'.$ingredients.'}';
    }
}
