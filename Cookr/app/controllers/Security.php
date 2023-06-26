<?php

namespace App\Controllers;

use App\Config\View;
use App\Forms\Register;
use App\Models\User;

class Security
{
    public function login(): void
    {
        echo "Login";
    }

    public function register(): void
    {
        $form = new Register();
        $view = new View("Security/register", "front");
        $view->assign('form', $form->getConfig());

        if ($form->isSubmit() && $form->isValid()) {
            $user = new User();
            $user->setFirstname();
            $user->setLastname();
            $user->setEmail();
            $user->setPassword();
            $user->save();
        }
        $view->assign("formErrors", $form->errors);
    }

    public function logout(): void
    {
        echo "logout";
    }
}
