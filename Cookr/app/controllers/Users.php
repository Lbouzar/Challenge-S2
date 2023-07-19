<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\User;
use App\Forms\CreateUser;
use App\Forms\UpdatePassword;
use App\Forms\UpdateUser;

class Users
{
    private $user;

    public function __construct()
    {
        $this->user = User::getInstance();
    }

    public function show()
    {
        $view = View::getInstance("Dashboard/users", "back");
        $view->assign("users", $this->user->selectWhere(null));
    }

    public function create()
    {
        $form = CreateUser::getInstance();
        $view = View::getInstance("Dashboard/createUsers", "back");
        $view->assign("form", $form->getConfig());
        if ($form->isSubmit() && $form->isValid()) {
            $this->user->setFirstname($form->getData("firstname"));
            $this->user->setLastname($form->getData("lastname"));
            $this->user->setEmail($form->getData("email"));
            $this->user->setPassword($form->getData("pwd"));
            $this->user->setStatus($form->getData("status"));
            $this->user->setRole(getenv($form->getData("role")));
            $this->user->save();
            $form->errors[] = "Création de l'utilisateur";
        }
        $view->assign("formErrors", $form->errors);
    }

    public function update()
    {
        $form = UpdateUser::getInstance();
        $updateForm = UpdatePassword::getInstance();
        $view = View::getInstance("Dashboard/updateUsers", "back");
        $view->assign('form', $form->getConfig($this->user->selectWhere(["id" => $_GET["id"]])));
        $view->assign('updateForm', $updateForm->getConfig());
        $secondsWait = 2;
        $this->user->setId($_GET["id"]);
        if ($form->isSubmit() && $form->isValid()) {
            $this->user->setFirstname($form->getData("firstname"));
            $this->user->setLastname($form->getData("lastname"));
            $this->user->setEmail($form->getData("email"));
            $this->user->setStatus($form->getData("status"));
            $this->user->setRole(getenv($form->getData("role")));
            $this->user->save();
            $form->errors[] = "Mise à jour de l'utilisateur";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);

        if ($updateForm->isSubmit() && $updateForm->isValid()) {
            $this->user->setPassword($form->getData("pwd"));
            $this->user->save();
            $updateForm->errors[] = "Mise à jour du mot de passe de l'utilisateur";
        }
        $view->assign('updateFormErrors', $updateForm->errors);
    }

    public function delete()
    {
        if (count($this->user->selectWhere(["id" => $_GET["id"]])) > 0) {
            $this->user->setId($_GET["id"]);
            $this->user->delete();

            header("Location: users-bo");
        } else {
            header("Location: users-bo");
        }
    }
}
