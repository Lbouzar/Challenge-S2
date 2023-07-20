<?php 

namespace App\Forms;

use App\Config\Verificator;

class CreateRecipespage extends Verificator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        return $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "",
                "enctype" => "",
                "id" => "",
                "class" => "",
                "submit" => "Créer"
            ],
            "inputs" => [
                "main_recipe_title" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la recette du jour",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la recette du jour"
                ],
                "title" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la liste des recettes",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la liste des recettes"
                ]
            ]
        ];
    }
}