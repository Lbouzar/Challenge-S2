<?php 
namespace App\Models;
use App\Config\Sql;

class Article extends Sql
{
    protected Int $id;
    protected String $title;
    protected String $description;
    protected $created_at;
    protected $updated_at;
    // protected $mots_clés

    /**
     * @return int
     */
    public function getId(): int 
    {
        return $this->id;
    }

    /**
     * @return String 
     */
    public function getTitle(): string 
    {
        return $this->title;
    }

    /**
     * @param String $title
     */
    public function setTitle(string $title): void 
    {
        $this->title = ucfirst(strtolower(trim($title)));
    }

    /**
     * @return String
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription(string $description): void 
    {
        $this->description = trim($description);
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}