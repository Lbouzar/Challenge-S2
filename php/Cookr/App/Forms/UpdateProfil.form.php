<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdateProfil extends Verificator
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
                "title1" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page",
                    "value" => $data[0]["firsttitle"] ?? ""
                ],
                "title2" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page",
                    "value" => $data[0]["secondtitle"] ?? ""
                ],
                "title3" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page",
                    "value" => $data[0]["lasttitle"] ?? ""
                ]
            ]
        ];
    }
}