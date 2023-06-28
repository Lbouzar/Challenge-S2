<?php

namespace App\Forms;

use App\Config\Verificator;

class Register extends Verificator
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
                "submit" => "Je m'inscris"
            ],
            "inputs" => [
                "firstname" => [
                    "type" => "text",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre prénom",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Votre prénom doit faire entre 2 et 60 caractères",
                    "required" => true
                ],
                "lastname" => [
                    "type" => "text",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre nom",
                    "min" => 2,
                    "max" => 120,
                    "error" => "Votre nom doit faire entre 2 et 120 caractères",
                    "required" => true
                ],
                "email" => [
                    "type" => "email",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre adresse email",
                    "error" => "Le format de votre email est incorrect",
                    "required" => true
                ],
                "pwd" => [
                    "type" => "password",
                    "class" => "input-regular--small",
                    "placeholder" => "Votre mot de passe",
                    "error" => "Votre mot de passe est incorrect",
                    "required" => true
                ],
                "pwdConfirm" => [
                    "type" => "password",
                    "class" => "input-regular--small",
                    "placeholder" => "Confirmation",
                    "confirm" => "pwd",
                    "error" => "Mot de passe de confirmation incorrect",
                    "required" => true
                ],
            ]
        ];
    }
}
