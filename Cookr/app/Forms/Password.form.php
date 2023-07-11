<?php

namespace App\Forms;

use App\Config\Verificator;

class Password extends Verificator
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
                "submit" => "Changer mon mot de passe"
            ],
            "inputs" => [
                "oldPwd" => [
                    "type" => "password",
                    "class" => "input-regular",
                    "placeholder" => "Mot de passe actuel",
                    "min" => 8,
                    "max" => 120,
                    "error" => "Veuillez entrer votre mot de passe",
                    "required" => true,
                    "label" => "Votre mot de passe"
                ],
                "pwd" => [
                    "type" => "password",
                    "class" => "input-regular",
                    "placeholder" => "Nouveau mot de passe",
                    "min" => 8,
                    "max" => 120,
                    "error" => "Votre mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial",
                    "required" => true,
                    "label" => "Nouveau mot de passe"
                ],
                "pwdConfirm" => [
                    "type" => "password",
                    "class" => "input-regular",
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
