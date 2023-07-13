<?php

namespace App\Models;

use App\Config\Sql;

class Article extends Sql
{
    protected String $id = " ";
    protected String $title;
    protected String $creator; // Auteur de l'article, clé étrangère 
    protected String $content;
    protected String $keywords;
    protected String $slug;
    protected Int $is_active;
    protected String $image = "article_picture.png";

    public function getId(): String
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = ucfirst(strtolower(trim($title)));
    }

    public function getCreator(): String
    {
        return $this->creator;
    }

    public function setCreator(String $creator): void
    {
        $this->creator = $creator;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = trim($content);
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = trim($keywords);
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = ucfirst(strtolower(trim($slug)));
    }

    public function getIsActive(): int
    {
        return $this->is_active;
    }

    public function setIsActive(int $is_active): void
    {
        $this->is_active = $is_active;
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
