<?php

namespace App\Forms;

use App\Config\Verificator;

class CreateHomepage extends Verificator
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
                "slogan" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Votre slogan",
                    "min" => 2,
                    "max" => 60,
                    "required" => true,
                    "label" => "Votre slogan"
                ],
                "firsttitle" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre 1",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre 1"
                ],
                "secondtitle" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre 2",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre 2"
                ],
            ]
        ];
    }
}
