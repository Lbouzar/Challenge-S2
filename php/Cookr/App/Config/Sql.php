<?php

namespace App\Config;

class Sql
{
    private $PDO = null;
    private $table = null;
    private static $instances = array();

    private function __construct()
    {
        try {
            if (getenv('CK_ENVIRONMENT') == "production") {
                $this->PDO = new \PDO("pgsql:host=" . getenv('DB_HOST_PROD') . ";port=" . getenv('DB_PORT') . ";dbname=" . getenv('POSTGRES_DB_PROD'), getenv('POSTGRES_USER_PROD'), getenv('POSTGRES_PASSWORD_PROD'));
            } else {
                $this->PDO = new \PDO("pgsql:host=" . getenv('DB_HOST_DEV') . ";port=" . getenv('DB_PORT') . ";dbname=" . getenv('POSTGRES_DB_DEV'), getenv('POSTGRES_USER_DEV'), getenv('POSTGRES_PASSWORD_DEV'));
            }
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
        $classExploded = explode("\\", get_called_class());
        $this->table = end($classExploded);
        $this->table = "ckr_" . strtolower($this->table);
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance()
    {
        $subClass = static::class;
        if (!isset(self::$instances[$subClass])) {
            self::$instances[$subClass] = new static();
        }
        return self::$instances[$subClass];
    }

    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToDeleted = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToDeleted);
        unset($columns["id"]);

        if ((is_string($this->getId()) && $this->getId() !== " " && preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $this->getId())) || (is_numeric($this->getId()) && $this->getId() > 0)) {
            $columnsUpdate = [];
            foreach ($columns as $key => $value) {
                $columnsUpdate[] = $key . "=:" . $key;
            }
            $queryPrepared = $this->PDO->prepare("UPDATE " . $this->table . " SET " . implode(",", $columnsUpdate) . " WHERE id = '" . $this->getId() . "'");
        } else {
            $queryPrepared = $this->PDO->prepare("INSERT INTO " . $this->table . " (" . implode(",", array_keys($columns)) . ") 
                            VALUES (:" . implode(",:", array_keys($columns)) . ")");
        }

        $queryPrepared->execute($columns);
    }

    public function delete(): void
    {
        $queryPrepared = $this->PDO->prepare("DELETE FROM " . $this->table . " WHERE id = '" . $this->getId() . "'");
        $queryPrepared->execute();
    }

    public function selectWhere(?array $array): array
    {
        if (isset($array)) {
            $where = [];
            foreach ($array as $column => $value) {
                $where[] = $column . " = :" . $column;
            }
            $queryPrepared = $this->PDO->prepare("SELECT * FROM " . $this->table . " WHERE " . implode(" AND ", $where));
            $queryPrepared->execute($array);
        } else {
            $queryPrepared = $this->PDO->prepare("SELECT * FROM " . $this->table);
            $queryPrepared->execute();
        }
        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserPassword(array $array): array
    {
        $where = [];
        foreach ($array as $column => $value) {
            $where[] = $column . " = :" . $column;
        }
        $queryPrepared = $this->PDO->prepare("SELECT password FROM " . $this->table . " WHERE " . implode(" AND ", $where));
        $queryPrepared->execute($array);
        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTableId(array $array): array
    {
        $where = [];
        foreach ($array as $column => $value) {
            $where[] = $column . " = :" . $column;
        }
        $queryPrepared = $this->PDO->prepare("SELECT id FROM " . $this->table . " WHERE " . implode(" AND ", $where));
        $queryPrepared->execute($array);
        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLatestData(?Int $limit): array
    {
        if (isset($limit)) {
            $queryPrepared = $this->PDO->prepare("SELECT * FROM " . $this->table . " ORDER BY created_at DESC LIMIT " . $limit);
        } else {
            $queryPrepared = $this->PDO->prepare("SELECT * FROM " . $this->table . " ORDER BY created_at DESC");
        }
        $queryPrepared->execute();

        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLatestDataWhere(array $array): array
    {
        $where = [];
        foreach ($array as $column => $value) {
            $where[] = $column . " = :" . $column;
        }
        $queryPrepared = $this->PDO->prepare("SELECT * FROM " . $this->table . " WHERE " . implode(" AND ", $where) . " ORDER BY created_at DESC LIMIT 3");
        $queryPrepared->execute($array);
        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCommentsOfRecipe(?array $array): array
    {
        if (isset($array)) {
            $where = [];
            foreach ($array as $column => $value) {
                $where[] = $column . " = :" . $column;
            }
            $queryPrepared = $this->PDO->prepare("SELECT " . $this->table . ".*, ckr_user.firstname FROM " . $this->table . " INNER JOIN ckr_user ON ckr_user.id = " . $this->table . ".creator WHERE " . implode(" AND ", $where));
            $queryPrepared->execute($array);
        } else {
            $queryPrepared = $this->PDO->prepare("SELECT " . $this->table . ".*, ckr_user.firstname FROM " . $this->table . " INNER JOIN ckr_user ON ckr_user.id = " . $this->table . ".creator");
            $queryPrepared->execute();
        }
        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLatestDataComments(?Int $limit): array
    {
        if (isset($limit)) {
            $queryPrepared = $this->PDO->prepare("SELECT " . $this->table . ".*, ckr_user.firstname FROM " . $this->table . " INNER JOIN ckr_user ON ckr_user.id = " . $this->table . ".creator ORDER BY created_at DESC LIMIT " .$limit);
        } else {
            $queryPrepared = $this->PDO->prepare("SELECT " . $this->table . ".*, ckr_user.firstname FROM " . $this->table . " INNER JOIN ckr_user ON ckr_user.id = " . $this->table . ".creator ORDER BY created_at DESC");
        }
        $queryPrepared->execute();

        return $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }
}
