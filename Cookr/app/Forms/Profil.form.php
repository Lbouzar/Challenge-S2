<?php

namespace App\Forms;

use App\Config\Verificator;
use App\Models\User;
use App\Config\Session;

class Profil extends Verificator
{
    protected $method = "POST";
    protected array $config = [];
    private $user;
    private $session;

    public function __construct()
    {
        $this->user = user::getInstance();
        $this->session = session::getInstance();
    }

    public function getConfig(): array
    {
        $userArray = $this->user->selectWhere(["id" => $this->session->id]);
        return $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "",
                "enctype" => "",
                "id" => "",
                "class" => "",
                "submit" => "Sauvegarder"
            ],
            "inputs" => [
                "firstname" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "min" => 2,
                    "max" => 60,
                    "error" => "Votre prénom doit faire entre 2 et 60 caractères",
                    "required" => false,
                    "label" => "Prénom",
                    "value" => $userArray[0]["firstname"]
                ],
                "lastname" => [
                    "type" => "text",
                    "class" => "input-regular",
                    "min" => 2,
                    "max" => 120,
                    "error" => "Votre nom doit faire entre 2 et 120 caractères",
                    "required" => false,
                    "label" => "Nom",
                    "value" => $userArray[0]["lastname"]
                ],
                "email" => [
                    "type" => "email",
                    "class" => "input-regular",
                    "error" => "Le format de votre email est incorrect",
                    "required" => false,
                    "label" => "E-mail",
                    "value" => $userArray[0]["email"]
                ]
            ]
        ];
    }
}
