<?php 

namespace App\Forms;

use App\Config\Verificator;

class Settings extends Verificator
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
                "font" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "0",
                            "name" => "Poppins",
                            "selected" => false
                        ],
                        [
                            "value" => "1",
                            "name" => "Lato",
                            "selected" => false
                        ],
                        [
                            "value" => "2",
                            "name" => "Roboto",
                            "selected" => false
                        ]
                    ],
                    "error" => "Font incorrecte",
                    "label" => "Police"
                ],
                // "color" => [
                //     "type" => "select",
                //     "options" => [
                //         [
                //             "value" => "1",
                //             "name" => "Oui",
                //             "selected" => false
                //         ],
                //         [
                //             "value" => "0",
                //             "name" => "Non",
                //             "selected" => false
                //         ]
                //     ],
                //     "error" => " ",
                //     "label" => "Recette active ?"
                // ],
            ]
        ];
    }
}