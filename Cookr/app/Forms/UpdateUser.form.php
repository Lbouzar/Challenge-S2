<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdateUser extends Verificator
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
                "id" => "form-display",
                "class" => "",
                "submit" => "Modifier"
            ],
            "inputs" => [
                "firstname" => [
                    "type" => "text",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre prénom",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Votre prénom doit faire entre 2 et 60 caractères",
                    "required" => true,
                    "label" => "Prénom",
                    "value" => $data[0]["firstname"]
                ],
                "lastname" => [
                    "type" => "text",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre nom",
                    "min" => 2,
                    "max" => 120,
                    "error" => "Votre nom doit faire entre 2 et 120 caractères",
                    "required" => true,
                    "label" => "Nom",
                    "value" => $data[0]["lastname"]
                ],
                "role" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "Utilisateur",
                            "name" => "Utilisateur",
                            "selected" => ($data[0]["role"] == getenv("Utilisateur")) ? true : false
                        ],
                        [
                            "value" => "Editeur",
                            "name" => "Editeur",
                            "selected" => ($data[0]["role"] == getenv("Editeur")) ? true : false
                        ],
                        [
                            "value" => "Moderateur",
                            "name" => "Moderateur",
                            "selected" => ($data[0]["role"] == getenv("Moderateur")) ? true : false
                        ],
                        [
                            "value" => "Admin",
                            "name" => "Administrateur",
                            "selected" => ($data[0]["role"] == getenv("Admin")) ? true : false
                        ]
                    ],
                    "error" => " ",
                    "label" => "Role de l'utilisateur"
                ],
                "status" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "0",
                            "name" => "Non",
                            "selected" => ($data[0]["status"] == 0) ? true : false
                        ],
                        [
                            "value" => "1",
                            "name" => "Oui",
                            "selected" => ($data[0]["status"] == 1) ? true : false
                        ]
                    ],
                    "error" => " ",
                    "label" => "Compte activé ?"
                ],
                "email" => [
                    "type" => "email",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre adresse email",
                    "error" => "Le format de votre email est incorrect",
                    "required" => true,
                    "label" => "Adresse e-mail",
                    "value" => $data[0]["email"]
                ]
            ]
        ];
    }
}
