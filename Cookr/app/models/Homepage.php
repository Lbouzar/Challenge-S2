<?php

namespace App\Models;

use App\Config\Sql;

class Homepage extends Sql
{
    protected Int $id = 0;
    protected String $slogan;
    protected String $firsttitle;
    protected String $secondtitle;
    protected String $logo;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
    }

    public function getSlogan(): string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): void 
    {
        $this->slogan = trim($slogan);
    }

    public function getFirsttitle(): string
    {
        return $this->firsttitle;
    }

    public function setFirsttitle(string $firsttitle): void 
    {
        $this->firsttitle = trim($firsttitle);
    }

    public function getSecondtitle(): string
    {
        return $this->secondtitle;
    }

    public function setSecondtitle(string $secondtitle): void 
    {
        $this->secondtitle = trim($secondtitle);
    }

    public function getLogo(): string 
    {
        return $this->logo;
    }

    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }
}