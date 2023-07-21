<?php 

namespace App\Models;

use App\Config\Sql;

class Settings extends Sql
{
    protected Int $id = 0;
    protected String $font = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function setFont(string $font): void 
    {
        $this->font = trim($font);
    }
}