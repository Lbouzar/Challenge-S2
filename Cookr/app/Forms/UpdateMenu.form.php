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
                "content" => [
                    "type" => "textarea",
                    "class" => "text-area",
                    "minlength" => 2,
                    "maxlength" => 300,
                    "cols" => 30,
                    "rows" => 7,
                    "required" => true,
                    "value" => $data[0]["content"]??"",
                    "label" => "Votre menu"
                ]
            ]
        ];
    }
}