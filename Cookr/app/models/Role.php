<?php

namespace App\Models;

use App\Config\Sql;

class Role extends Sql
{
    protected Int $id;
    protected String $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getName(): string 
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = ucfirst(strtolower(trim($name)));
    }  
}
