<?php
namespace App\Controllers;
use App\Config\View;

class Profile {
    public function profile() {
        $view = new View("Profile/profile", "front");
        // récupérer la data dans la bdd
    }
}