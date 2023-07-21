<?php

namespace App\Forms;

use App\Config\Verificator;

class UpdatePassword extends Verificator
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
                "submit" => "Modifier le mot de passe"
            ],
            "inputs" => [
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
