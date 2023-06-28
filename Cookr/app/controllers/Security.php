<?php

namespace App\Controllers;

use App\Config\View;
use App\Forms\Register;
use App\Models\User;
use App\Emails\Email;

class Security
{
    public function login(): void
    {
        echo "login";
    }

    public function register(): void
    {
        $form = new Register();
        $user = new User();
        $email = new Email();
        $view = new View("Security/register", "front");
        $view->assign('form', $form->getConfig());

        if ($form->isSubmit() && $form->isValid()) {
            if (count($user->selectWhere(["email" => $form->getData("email")])) == 0) {
                $user->setFirstname($form->getData("firstname"));
                $user->setLastname($form->getData("lastname"));
                $user->setEmail($form->getData("email"));
                $user->setPassword($form->getData("pwd"));
                $user->setToken(self::generateToken());
                $token = $user->getToken();
                $user->save();

                // envoie du mail de confirmation
                if ($email->register_mail($form->getData("email"), $form->getData("firstname") . ' ' . $form->getData("lastname"), $token)) {
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
        $user = new User(); 
        $userArray = $user->selectWhere(["email" => $_GET["email"], "token" => $_GET["token"]]);
        if (count($userArray) == 1) {
            $user->setId($userArray[0]["id"]);
            $user->setStatus(1);
            $user->save();
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
