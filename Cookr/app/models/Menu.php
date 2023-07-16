<?php

namespace App\Models;

use App\Config\Sql;

class Menu extends Sql
{
    protected Int $id = 0;
    protected String $title;
    protected String $link_route;
    protected Int $is_active;

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
        $this->title = ucfirst(strtolower(trim($title)));
    }

    public function getRoute(): string
    {
        return $this->link_route;
    }

    public function setRoute(string $link_route): void
    {
        $this->link_route = trim($link_route);
    }

    public function getIsActive(): int
    {
        return $this->is_active;
    }

    public function setIsActive(int $is_active): void
    {
        $this->is_active = $is_active;
    }
}
