<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdateRegister extends Verificator
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
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page",
                    "value" => $data[0]["title"] ?? ""
                ],
                "link_title" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre du lien",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre du lien",
                    "value" => $data[0]["link_title"] ?? ""
                ],
                "link_route" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Lien du titre",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le lien doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Lien du titre",
                    "value" => $data[0]["link_route"] ?? ""
                ]
            ]
        ];
    }
}