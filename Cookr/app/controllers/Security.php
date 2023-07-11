<?php

namespace App\Controllers;

use App\Config\View;
use App\Config\Session;
use App\Forms\Register;
use App\Models\User;
use App\Emails\Email;
use App\Forms\Contact;
use App\Forms\Login;
use App\Forms\Password;
use App\Forms\Profil;

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
                    if ($this->email->register_mail($form->getData("email"), $token)) {
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
            $retryUser = $this->user->selectWhere(["email" => $_GET["email"]]);
            $this->user->setId($retryUser[0]["id"]);
            $this->user->setToken(self::generateToken());
            $token = $this->user->getToken();
            $this->user->save();
            $this->email->register_mail($_GET["email"], $token);
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
                else if (password_verify($form->getData("pwd"), $this->user->getUserPassword(["email" => $form->getData("email")])[0]["password"])) {
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
            $data = $this->user->selectWhere(["id" => $this->session->id]);
            if (count($data) == 1) {
                $updateUser = Profil::getInstance();
                $updatePwd = Password::getInstance();

                $this->user->setId($this->session->id);
                $this->user->setStatus(1);

                $secondsWait = 2;

                $view = View::getInstance("Security/profil", "front");
                $view->assign("userInfos", $data[0]["firstname"]. " ".$data[0]["lastname"]);
                $view->assign('formUpdateUser', $updateUser->getConfig());
                $view->assign('formUpdatePassword', $updatePwd->getConfig());

                if ($updateUser->isSubmit() && $updateUser->isValid()) {
                    //mise à jour du profil
                    $this->user->setFirstname($updateUser->getData("firstname"));
                    $this->user->setLastname($updateUser->getData("lastname"));
                    if ($data[0]['email'] != $updateUser->getData("email")) {
                        $this->email->update_mail($data[0]['email']);
                        $this->user->setEmail($updateUser->getData("email"));
                    }
                    $this->user->save();
                    $updateUser->errors[] = "Mise à jour de votre profil";
                    header("Refresh:$secondsWait");
                }
                $view->assign("updateUserErrors", $updateUser->errors);

                if ($updatePwd->isSubmit() && $updatePwd->isValid()) {
                    if (password_verify($updatePwd->getData("oldPwd"), $data[0]["password"])) {
                        //mise à jour du mot de passe
                        $this->email->update_mail($data[0]['email']);
                        $this->user->setPassword($updatePwd->getData("pwd"));
                        $this->user->save();
                        $updatePwd->errors[] = "Mise à jour de votre mot de passe";
                    } else {
                        $updatePwd->errors[] = "Votre ancien mot de passe est incorrect";
                    }
                }
                $view->assign("updatePasswordErrors", $updatePwd->errors);
            } else {
                $this->session->destroy();
                //redirection page de connexion
                header("Location: login");
            }
        }
    }

    public function contact(): void
    {
        $view = View::getInstance("Security/contact", "front");
        $form = Contact::getInstance();
        $view->assign('form', $form->getConfig());

        if ($form->isSubmit() && $form->isValid()) {
            // envoyer un mail à l'admin et aux modérateurs
            $recipients = $this->user->selectWhere(["role" => getenv('Admin')]);
            array_push($recipients, $this->user->selectWhere(["role" => getenv('Moderateur')]));
            // envoie du mail à la team
            if ($this->email->contact_team_mail($form->getData("email"), $form->getData("firstname") . ' ' . $form->getData("lastname"), $form->getData("message"), $recipients)) {
                $form->errors[] = "Super notre équipe à reçu ton message !";
            } else {
                $form->errors[] = "Nous n'avons pas pu vous envoyer ton message";
            }
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
