<?php

namespace App\Controllers;

use App\Config\View;
use App\Config\Session;
use App\Forms\Register;
use App\Models\User;
use App\Emails\Email;
use App\Forms\Contact;
use App\Forms\Login;

class Security
{
    private $user;
    private $email;
    private $session;

    public function __construct()
    {
        $this->user = user::getInstance();
        $this->email = Email::getInstance();
        $this->session = session::getInstance();
    }

    public function register(): void
    {
        if (isset($this->session->id) && isset($this->session->token) && isset($this->session->role) && self::isLogged($this->session->token)) {
            header("Location: profil");
        } else {
            $form = Register::getInstance();
            $view = View::getInstance("Security/register", "front");
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
                    if ($this->email->register_mail($form->getData("email"),$token)) {
                        $form->errors[] = "Valide ton compte avec le mail envoyé (regarde tes spams aussi)";
                    } else {
                        $form->errors[] = "Nous n'avons pas pu vous envoyer un mail de confirmation";
                    }
                } else {
                    $form->errors[] = "Un compte existe déjà avec cette adresse mail";
                }
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function confirm(): void
    {
        $userArray = $this->user->selectWhere(["email" => $_GET["email"], "token" => $_GET["token"]]);
        if (count($userArray) == 1) {
            $this->user->setId($userArray[0]["id"]);
            $this->user->setStatus(1);
            $this->user->save();
            // redirection vers la page de connexion
            header("Location: login");
        } else {
            //renvoyer un mail 
            $this->user->setId($userArray[0]["id"]);
            $this->user->setToken(self::generateToken());
            $token = $this->user->getToken();
            $this->email->register_mail($_GET["email"],$token);
            die("Erreur lors de la validation, un mail vous a été envoyé");
        }
    }

    public function login(): void
    {
        if (isset($this->session->id) && isset($this->session->token) && isset($this->session->role) && self::isLogged($this->session->token)) {
            header("Location: profil");
        } else {
            $form = Login::getInstance();
            $view = View::getInstance("Security/login", "front");
            $view->assign('form', $form->getConfig());

            if ($form->isSubmit() && $form->isValid()) {
                if (count($this->user->selectWhere(["email" => $form->getData("email")])) != 1) {
                    $form->errors[] = "Aucun compte existant avec cette adresse mail";
                } else if (count($this->user->selectWhere(["email" => $form->getData("email"), "status" => 1])) != 1) {
                    $form->errors[] = "Votre compte n'est pas validé";
                }
                //Vérification du mot de passe
                if (password_verify($form->getData("pwd"), $this->user->getUserPassword(["email" => $form->getData("email")])[0]["password"])) {
                    //mise à jour du Token
                    $this->user->setId($this->user->getTableId(["email" => $form->getData("email")])[0]["id"]);
                    $this->user->setStatus(1);
                    $this->user->setToken(self::generateToken());
                    $this->user->save();
                    //Récupération des infos de l'utilisateur
                    $userArray = $this->user->selectWhere(["email" => $form->getData("email")]);
                    //mise en place des informations en session
                    $this->session->id = $userArray[0]["id"];
                    $this->session->token = $userArray[0]["token"];
                    $this->session->role = $userArray[0]["role"];
                    if (isset($this->session->id) && isset($this->session->token) && isset($this->session->role) && self::isLogged($this->session->token)) {
                        header("Location: profil");
                    } else {
                        $form->errors[] = "Connexion impossible";
                    }
                } else {
                    $form->errors[] = "Mot de passe incorrect";
                }
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function profil(): void
    {
        if (!isset($this->session->id) || !isset($this->session->token) || !isset($this->session->role) || !self::isLogged($this->session->token)) {
            header("Location: login");
        } else {
            $view = View::getInstance("Security/profil", "front");
        }
    }

    public function contact(): void 
    {
        $view = View::getInstance("Security/contact", "front");
        $form = Contact::getInstance();
        $view->assign('form', $form->getConfig());

        if ($form->isSubmit() && $form->isValid()) {
            // envoyer un mail à l'admin et aux modérateurs
        }

        $view->assign("formErrors", $form->errors);
    }
    public function logout(): void
    {
        $this->session->destroy();
        //redirection page de connexion
        header("Location: login");
    }

    public static function generateToken()
    {
        $secretKey = "CoorkGotDaGoodFood";
        // Deux heures d'expiration 
        $secretTime = time() + (2 * 60 * 60);

        $token = $secretKey . '|' . $secretTime;
        $tokenHash = hash('sha256', $token);

        $secretToken = base64_encode($token . '|' . $tokenHash);

        return $secretToken;
    }

    public static function isLogged($sessionToken): bool
    {
        $secretKey = "CoorkGotDaGoodFood";

        $decodedToken = base64_decode($sessionToken);
        $tokenParts = explode('|', $decodedToken);

        if (count($tokenParts) === 3) {
            $tokenData = $tokenParts[0] . '|' . $tokenParts[1];
            $hashedToken = hash('sha256', $tokenData);

            if ($tokenParts[2] === $hashedToken && $tokenParts[0] === $secretKey && time() < intval($tokenParts[1])) {
                return true;
            }
        }
        return false;
    }
}
