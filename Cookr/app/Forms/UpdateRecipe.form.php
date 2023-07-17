<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdateRecipe extends Verificator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(array $data): array
    {
        return $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "",
                "enctype" => "multipart/form-data",
                "id" => "",
                "class" => "",
                "submit" => "Modifier"
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
                    "label" => "Titre",
                    "value" => $data[0]["title"]
                ],
                "slug" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Le slug de la recette",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le slug doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Slug",
                    "value" => $data[0]["slug"]
                ],
                "is_main" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "0",
                            "name" => "Non",
                            "selected" => ($data[0]["is_main"] == 0) ? true : false
                        ],
                        [
                            "value" => "1",
                            "name" => "Oui",
                            "selected" => ($data[0]["is_main"] == 1) ? true : false
                        ]
                    ],
                    "error" => "Status incorrecte",
                    "label" => "Recette du jour ?"
                ],
                "is_active" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "1",
                            "name" => "Oui",
                            "selected" => ($data[0]["is_active"] == 1) ? true : false
                        ],
                        [
                            "value" => "0",
                            "name" => "Non",
                            "selected" => ($data[0]["is_active"] == 0) ? true : false
                        ]
                    ],
                    "error" => " ",
                    "label" => "Recette active ?"
                ],
                "preparation_time" => [
                    "type" => "number",
                    "class" => "input-regular",
                    "placeholder" => "Temps en minutes",
                    "error" => "Veuillez saisir un temps de préparation",
                    "required" => true,
                    "label" => "Temps de préparation",
                    "value" => $data[0]["preparation_time"]
                ],
                "cooking_time" => [
                    "type" => "number",
                    "class" => "input-regular",
                    "placeholder" => "Temps en minutes",
                    "error" => "Veuillez saisir un temps de cuisson",
                    "required" => true,
                    "label" => "Temps de cuisson",
                    "value" => $data[0]["cooking_time"]
                ],
                "price" => [
                    "type" => "number",
                    "class" => "input-regular",
                    "placeholder" => "Prix en euros",
                    "error" => "Veuillez saisir un prix",
                    "required" => true,
                    "label" => "Prix",
                    "value" => $data[0]["price"]
                ],
                "presentation" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "required" => true,
                    "label" => "Présentation de la recette",
                    "value" => $data[0]["presentation"]
                ],
                "ingredients" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "required" => true,
                    "label" => "Ingrédients de la recette",
                    "value" => $data[0]["ingredients"]
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
                    "label" => "Description de la recette",
                    "value" => $data[0]["description"]
                ],
                "logo" => [
                    "type" => "file",
                    "class" => "input-regular",
                    "placeholder" => "Votre logo",
                    "error" => "Veuillez saisir un logo",
                    "required" => false,
                    "label" => "Votre logo",
                    "accept" => "image/*"
                ]
            ]
        ];
    }
}
