<?php

namespace App\Models;

use App\Config\Sql;

class Role extends Sql
{
    protected String $id;
    protected String $name;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void 
    {
        $this->id = $id;
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
