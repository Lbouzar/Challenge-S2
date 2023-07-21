<?php

namespace App\Forms;

use App\Config\Verificator;

class CreateContact extends Verificator
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
                    "placeholder" => "Titre de la page",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Le titre doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Titre de la page"
                ],
                "content" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "error" => "",
                    "required" => false,
                    "label" => "Description de la page"
                ]
            ]
        ];
    }
}