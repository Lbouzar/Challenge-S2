<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdateArticle extends Verificator
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
                    "placeholder" => "Le titre de l'article",
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
                    "placeholder" => "Le slug de l'article",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le slug doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Slug",
                    "value" => $data[0]["slug"]
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
                    "label" => "Article actif ?"
                ],
                "keywords" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Séparer les mots clés par des /",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Veuillez mettre des mots-clés",
                    "required" => true,
                    "label" => "Mots-clés",
                    "value" => $data[0]["keywords"]
                ],
                "logo" => [
                    "type" => "file",
                    "class" => "input-regular",
                    "placeholder" => "Votre logo",
                    "error" => "Veuillez saisir une image",
                    "required" => false,
                    "label" => "Image de couverture",
                    "accept" => "image/*"
                ],
                // "content" => [
                //     "id" => "myTextarea",
                //     "type" => "textarea",
                //     "class" => "text-area",
                //     "minlength" => 2,
                //     "maxlength" => 300,
                //     "cols" => 30,
                //     "rows" => 10,
                //     "required" => true,
                //     "label" => "Contenu de l'article"
                // ]
            ]
        ];
    }
}
