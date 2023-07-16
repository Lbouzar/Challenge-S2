<?php 

namespace App\Forms;

use App\Config\Verificator;

class CreateMenu extends Verificator
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
                    "placeholder" => "Le titre du menu",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre du menu"
                ],
                "link_route" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Lien du titre",
                    "min" => 1,
                    "max" => 60,
                    "error" => "Le lien doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Lien du titre"
                ],
                "is_active" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "1",
                            "name" => "Oui"
                        ],
                        [
                            "value" => "0",
                            "name" => "Non"
                        ]
                    ],
                    "error" => " ",
                    "label" => "Lien actif ?"
                ]
            ]
        ];
    }
}