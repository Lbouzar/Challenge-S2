<?php
namespace App\Controllers;
use App\Config\View; 

class Dashboard {
    public function dashboard() {
        $view = new View("Dashboard/dashboard", "back");
        //récupérer dans la bdd les articles et recettes 
        // voir template Figma 
    }
}