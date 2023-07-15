<?php

namespace App\Forms;

use App\Config\Verificator;

class CreateProfil extends Verificator
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
                "title1" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page"
                ],
                "title2" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page"
                ],
                "title3" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page"
                ]
            ]
        ];
    }
}