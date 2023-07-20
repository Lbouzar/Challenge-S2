<?php

namespace App\Models;

use App\Config\Sql;

class Article_History extends Sql
{
    protected String $id = " ";
    protected String $recipe;
    protected String $title;
    protected String $keywords;
    protected String $content;
    protected String $slug;
    protected String $image;

    public function getId(): string 
    {
        return $this->id;
    }

    public function setId(string $id): void 
    {
        $this->id = $id;
    }

    public function getRecipe(): string
    {
        return $this->recipe;
    }

    public function setRecipe(string $recipe): void
    {
        $this->recipe = $recipe;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title): void 
    {
        $this->title = $title;
    }

    public function getKeywords() : string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void 
    {
        $this->keywords = $keywords;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void 
    {
        $this->content = $content;
    }

    public function getSlug(): string 
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getImage(): string 
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}