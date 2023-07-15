<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdateHomepage extends Verificator
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
                "slogan" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Votre slogan",
                    "min" => 2,
                    "max" => 60,
                    "required" => true,
                    "label" => "Votre slogan",
                    "value" => $data[0]["slogan"]??"",
                ],
                "firsttitle" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre 1",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre 1",
                    "value" => $data[0]["firsttitle"]??"",
                ],
                "secondtitle" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "placeholder" => "Titre 2",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre 2",
                    "value" => $data[0]["secondtitle"]??"",
                ],
            ]
        ];
    }
}