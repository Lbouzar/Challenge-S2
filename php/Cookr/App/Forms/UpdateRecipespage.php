<?php 

namespace App\Forms;

use App\Config\Verificator;

class UpdateRecipespage extends Verificator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(array $data): array
    {
        return $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "",
                "enctype" => "",
                "id" => "",
                "class" => "",
                "submit" => "Modifier"
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
                    "label" => "Titre de la recette du jour",
                    "value" => $data[0]["main_recipe_title"]??""
                ],
                "title" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la liste des recettes",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la liste des recettes",
                    "value" => $data[0]["title"]??""
                ]
            ]
        ];
    }
}