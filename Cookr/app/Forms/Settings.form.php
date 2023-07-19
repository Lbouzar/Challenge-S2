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
                    "id" => "fontSettings",
                    "options" => [
                        [
                            "value" => "poppins",
                            "name" => "Poppins",
                            "selected" => false
                        ],
                        [
                            "value" => "lato",
                            "name" => "Lato",
                            "selected" => false
                        ],
                        [
                            "value" => "roboto",
                            "name" => "Roboto",
                            "selected" => false
                        ]
                    ],
                    "error" => "Font incorrecte",
                    "label" => "Police"
                ],
                // "color" => [
                //     "type" => "select",
                //     "id" => "colorSettings",
                //     "options" => [
                //         [
                //             "value" => "orange",
                //             "name" => "Orange",
                //             "selected" => false
                //         ],
                //         [
                //             "value" => "red",
                //             "name" => "Red",
                //             "selected" => false
                //         ]
                //     ],
                //     "error" => "Couleur incorrecte",
                //     "label" => "Couleur"
                // ],
            ]
        ];
    }
}