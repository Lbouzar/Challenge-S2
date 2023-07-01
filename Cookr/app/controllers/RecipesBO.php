<?php
namespace App\Controllers;
use App\Config\View; 

class RecipesBO {
    public function recipesBO() {
        $view = new View("RecipesBO/recipesBO", "back");
        //récupérer dans la bdd les articles et recettes 
        // voir template Figma 
    }
}