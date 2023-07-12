<?php

namespace App\Models;

use App\Config\Sql;

class Article extends Sql
{
    protected String $id = " ";
    protected String $title;
    protected String $user; // Auteur de l'article, clé étrangère 
    protected String $content;
    protected String $keywords;
    protected String $slug;

    /**
     * @return string
     */
    public function getId(): String
    {
        return $this->id;
    }

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

    public function getUser(): String
    {
        return $this->user;
    }

    public function setUser(String $user): void
    {
        $this->user = $user;
    }

    /**
     * @return String
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param String $content
     */
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
        $this->keywords = $keywords;
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
