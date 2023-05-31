<?php

namespace App\Config;

abstract class Sql
{

    private $pdo;
    private $table;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("pgsql:host=" . getenv('DB_HOST') . ";port=" . getenv('DB_PORT') . ";dbname=" . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }

        $classExploded = explode("\\", get_called_class());
        $this->table = end($classExploded);
        $this->table = "ckr_" . $this->table;
    }

    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToDeleted = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToDeleted);
        unset($columns["id"]);

        if (is_numeric($this->getId()) && $this->getId() > 0) {
            $columnsUpdate = [];
            foreach ($columns as $key => $value) {
                $columnsUpdate[] = $key . "=:" . $key;
            }
            $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET " . implode(",", $columnsUpdate) . " WHERE id =" . $this->getId());
        } else {
            $queryPrepared = $this->pdo->prepare("INSERT INTO " . $this->table . " (" . implode(",", array_keys($columns)) . ") 
                            VALUES (:" . implode(",:", array_keys($columns)) . ")");
        }

        $queryPrepared->execute($columns);
    }

    public function delete(): void
    {
        $queryPrepared = $this->pdo->prepare("DELETE FROM " .$this->table . " WHERE id =" . $this->getId());
    }

    public function select($request): void 
    {
        $queryPrepared = $this->pdo->prepare("SELECT " .$request. "FROM " .$this->table);
    }

    public function where($field, $operator ,$value): void
    {
        $queryPrepared = $this->pdo->prepare("WHERE ".$field. " ".$operator. " ".$value  );
    }

    public function join($joinType, $newTable, $request): void 
    {
        $queryPrepared = $this->pdo->prepare($joinType . "JOIN " .$newTable. " ON " .$request);
    }

    /**
     * ok, le plan est "simple" :
     * Dans un select, j'ai besoin de savoir la rêquete
     * Dans un select, je peux avoir une ou plusieurs conditions (where, group by, order by, limit)
     * Dans un select, je peux avoir une ou plusieurs jointures (inner, cross, left, right)
     * Résultat attendu :
     * $user = new User();
     * $user->select(*)->join(inner, role, role.id = user.role_id)->where(role.id, = ,4)
     */

}
