<?php
namespace App\Controllers;
session_start();
use App\Config\View;
use App\Forms\Register;
use App\Models\User;
use App\Emails\Email;
use App\Forms\Login;

class Security
{
    private $user;
    private $email;

    public function __construct()
    {
        $this->user = user::getInstance();
        $this->email = new Email();
    }

    public function register(): void
    {
        if (isset($_SESSION["email"]) && isset($_SESSION["token"]) && self::isLogged($_SESSION["email"], $_SESSION["token"])) {
            header("Location: profil");
        } else {
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
        }
        // redirection vers la page de connexion
        header("Location: login");
    }

    public function login(): void
    {
        if (isset($_SESSION["email"]) && isset($_SESSION["token"]) && self::isLogged($_SESSION["email"], $_SESSION["token"])) {
            header("Location: profil");
        } else {
            $form = new Login();
            $view = new View("Security/login", "front");
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
                    $_SESSION["email"] = $userArray[0]["email"];
                    $_SESSION["token"] = $userArray[0]["token"];
                    $_SESSION["role"] = $userArray[0]["role"];
                    if (self::isLogged($_SESSION["email"], $_SESSION["token"]));
                    header("Location: profil");
                } else {
                    $form->errors[] = "Mot de passe incorrect";
                }
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function profil(): void
    {
        if (!isset($_SESSION["email"]) && !isset($_SESSION["token"]) && !self::isLogged($_SESSION["email"], $_SESSION["token"])) {
            header("Location: login");
        } else {
            echo "profil";
        }
    }

    public function logout(): void
    {
        session_destroy();
        //redirection page de connexion
        header("Location: login");
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

    //Vérification du token actuel en bdd
    public static function isLogged($sessionEmail, $sessionToken): bool
    {
        if (isset($sessionEmail) && isset($sessionToken)) {
            $userArray = user::getInstance();
            $userArray = $userArray->selectWhere(["email" => $sessionEmail]);
            if ($sessionToken == $userArray[0]["token"])
                return true;
        }
        return false;
    }

}