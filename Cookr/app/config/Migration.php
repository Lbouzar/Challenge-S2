<?php

namespace App\Config;

abstract class Migration
{

    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("pgsql:host=" . getenv('DB_HOST') . ";port=" . getenv('DB_PORT') . ";dbname=" . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

    
}
