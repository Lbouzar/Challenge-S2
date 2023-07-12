<?php

namespace App\Models;

use App\Config\Sql;

class Recipe extends Sql
{
    protected String $id = " ";
    protected String $title;
    protected String $description; //Les étapes de la recette
    protected String $difficulty;
    protected Int $is_main;
    protected String $presentation;
    protected Int $preparation_time;
    protected Int $cooking_time;
    protected Int $price;
    protected String $ingredients;
    protected String $slug;

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
        $this->description = trim($difficulty);
    }

    public function getIsMain(): int
    {
        return $this->is_main;
    }

    public function setIsMain(int $isMain): void
    {
        $this->is_main = $isMain;
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
        return $this->preparation_time;
    }

    public function setPreparationTime(int $preparationTime): void
    {
        $this->preparation_time = $preparationTime;
    }

    public function getCookingTime(): int
    {
        return $this->cooking_time;
    }

    public function setCookingTime(int $cookingTime): void
    {
        $this->cooking_time = $cookingTime;
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
        $this->ingredients = '{' . $ingredients . '}';
    }

    /**
     * @return String 
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param String $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = ucfirst(strtolower(trim($slug)));
    }
}
