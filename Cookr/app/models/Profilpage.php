<?php

namespace App\Models;

use App\Config\Sql;

class Profilpage extends Sql
{
    protected Int $id = 0;
    protected String $firsttitle;
    protected String $secondtitle;
    protected String $lasttitle;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function getLasttitle(): string
    {
        return $this->lasttitle;
    }

    public function setLasttitle(string $lasttitle): void
    {
        $this->lasttitle = trim($lasttitle);
    }
}
