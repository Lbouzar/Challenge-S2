<?php 

namespace App\Forms;

use App\Config\Verificator;

class UpdateMenu extends Verificator
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
                "title" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Le titre du menu",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "value" => $data[0]["title"]??"",
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
                    "value" => $data[0]["link_route"]??"",
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