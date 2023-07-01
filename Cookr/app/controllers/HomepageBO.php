<?php
namespace App\Controllers;
use App\Config\View; 

class HomepageBO {
    public function homepageBO() {
        $view = new View("HomepageBO/homepageBO", "back");
        //récupérer dans la bdd les articles et recettes 
        // voir template Figma 
    }
}