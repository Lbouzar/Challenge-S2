<?php

namespace App\Forms;

use App\Config\Verificator;

class Login extends Verificator
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
                "submit" => "Connexion"
            ],
            "inputs" => [
                "email" => [
                    "type" => "email",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre email",
                    "error" => "Le format de votre email est incorrect",
                    "required" => true,
                    "label" => "Adresse e-mail"
                ],
                "pwd" => [
                    "type" => "password",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre mot de passe",
                    "error" => "Votre mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial",
                    "required" => true,
                    "label" => "Mot de passe"
                ]
            ]
        ];
    }
}
