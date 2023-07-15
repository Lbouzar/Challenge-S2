<?php 

namespace App\Models;

use App\Config\Sql;

class Registerpage extends Sql
{
    protected Int $id = 0;
    protected String $title;
    protected String $link_title;
    protected String $link_route;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void 
    {
        $this->title = trim($title);
    }

    public function getLink(): string 
    {
        return $this->link_title;
    }

    public function setLink(string $link_title): void 
    {
        $this->link_title = trim($link_title);
    }

    public function getRoute(): string
    {
        return $this->link_route;
    }

    public function setRoute(string $link_route): void 
    {
        $this->link_route = trim($link_route);
    }
}