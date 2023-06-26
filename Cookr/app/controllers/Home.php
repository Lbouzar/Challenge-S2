<?php
namespace App\Controllers;
use App\Config\View; 

class Home {
    public function index() {
        $view = new View("Home/home", "front");
        //récupérer dans la bdd les articles et recettes 
        // voir template Figma 
    }
}