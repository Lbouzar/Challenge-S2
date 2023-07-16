<?php

namespace App\Forms;

use App\Config\Verificator;

class CreateUser extends Verificator
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
                "id" => "form-display",
                "class" => "",
                "submit" => "Créer"
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
                    "label" => "Prénom"
                ],
                "lastname" => [
                    "type" => "text",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre nom",
                    "min" => 2,
                    "max" => 120,
                    "error" => "Votre nom doit faire entre 2 et 120 caractères",
                    "required" => true,
                    "label" => "Nom"
                ],
                "role" => [
                    "type" => "select",
                    "options" => [
                        [
                            "value" => "Utilisateur",
                            "name" => "Utilisateur"
                        ],
                        [
                            "value" => "Editeur",
                            "name" => "Editeur"
                        ],
                        [
                            "value" => "Moderateur",
                            "name" => "Moderateur"
                        ],
                        [
                            "value" => "Admin",
                            "name" => "Administrateur"
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
                            "name" => "Non"
                        ],
                        [
                            "value" => "1",
                            "name" => "Oui"
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
                    "label" => "Adresse e-mail"
                ],
                "pwd" => [
                    "type" => "password",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre mot de passe",
                    "min" => 8,
                    "max" => 120,
                    "error" => "Votre mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial",
                    "required" => true,
                    "label" => "Mot de passe"
                ],
                "pwdConfirm" => [
                    "type" => "password",
                    "class" => "input-regular--small",
                    "placeholder" => "Confirmation",
                    "min" => 8,
                    "max" => 120,
                    "error" => "Mot de passe de confirmation incorrect",
                    "required" => true,
                    "label" => "Confirmation du mot de passe"
                ],
            ]
        ];
    }
}
