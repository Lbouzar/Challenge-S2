<?php

namespace App\Forms;

use App\Config\Verificator;

class CreateRecipe extends Verificator
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
                "title" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Le titre de la recette",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre"
                ],
                "slug" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Le slug de la recette",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le slug doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Slug"
                ],
                "difficulty" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "Facile",
                            "name" => "Facile"
                        ],
                        [
                            "value" => "Normal",
                            "name" => "Normal"
                        ],
                        [
                            "value" => "Difficile",
                            "name" => "Difficile"
                        ]
                    ],
                    "error" => "Difficulté incorrecte",
                    "required" => true,
                    "label" => "Difficulté"
                ],
                "is_main" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "0",
                            "name" => "Non"
                        ],
                        [
                            "value" => "1",
                            "name" => "Oui"
                        ]
                    ],
                    "error" => "Status incorrecte",
                    "label" => "Recette du jour ?"
                ],
                "preparation_time" => [
                    "type" => "number",
                    "class" => "input-regular",
                    "placeholder" => "Temps en minutes",
                    "error" => "Veuillez saisir un temps de préparation",
                    "required" => true,
                    "label" => "Temps de préparation"
                ],
                "cooking_time" => [
                    "type" => "number",
                    "class" => "input-regular",
                    "placeholder" => "Temps en minutes",
                    "error" => "Veuillez saisir un temps de cuisson",
                    "required" => true,
                    "label" => "Temps de cuisson"
                ],
                "price" => [
                    "type" => "number",
                    "class" => "input-regular",
                    "placeholder" => "Prix en euros",
                    "error" => "Veuillez saisir un prix",
                    "required" => true,
                    "label" => "Prix"
                ],
                "presentation" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "required" => true,
                    "label" => "Présentation de la recette"
                ],
                "ingredients" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "required" => true,
                    "label" => "Ingrédients de la recette"
                ],
                //étape de la recette
                "description" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "required" => true,
                    "label" => "Description de la recette"
                ],
            ]
        ];
    }
}
