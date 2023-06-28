<?php

namespace App\Controllers;

use App\Config\View;
use App\Forms\Register;
use App\Models\User;
use App\Emails\Email;

class Security
{
    private $user;
    private $email;

    public function __construct()
    {
        $this->user = user::getInstance();
        $this->email = new Email();

    }
    
    public function login(): void
    {
        echo "login";
    }

    public function register(): void
    {
        $form = new Register();
        $view = new View("Security/register", "front");
        $view->assign('form', $form->getConfig());
        
        if ($form->isSubmit() && $form->isValid()) {
            if (count($this->user->selectWhere(["email" => $form->getData("email")])) == 0) {
                $this->user->setFirstname($form->getData("firstname"));
                $this->user->setLastname($form->getData("lastname"));
                $this->user->setEmail($form->getData("email"));
                $this->user->setPassword($form->getData("pwd"));
                $this->user->setToken(self::generateToken());
                $token = $this->user->getToken();
                $this->user->save();

                // envoie du mail de confirmation
                if ($this->email->register_mail($form->getData("email"), $form->getData("firstname") . ' ' . $form->getData("lastname"), $token)) {
                    $form->errors[] = "Valide ton compte avec le mail envoyé (regarde tes spams aussi)";
                } else {
                    $form->errors[] = "Nous n'avons pas pu vous envoyer un mail de confirmation";
                }
            }
            $form->errors[] = "Un compte existe déjà avec cette adresse mail";
        }
        $view->assign("formErrors", $form->errors);
    }

    public function confirm(): void
    { 
        $userArray = $this->user->selectWhere(["email" => $_GET["email"], "token" => $_GET["token"]]);
        if (count($userArray) == 1) {
            $this->user->setId($userArray[0]["id"]);
            $this->user->setStatus(1);
            $this->user->save();
        }
        // redirection vers la page de connexion
        header("Location: login");
    }

    public function logout(): void
    {
        echo "logout";
    }

    public static function generateToken(): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!?./$';
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < 40; $i++) {
            $token .= $characters[rand(0, $charactersLength - 1)];
        }
        return $token;
    }
}
