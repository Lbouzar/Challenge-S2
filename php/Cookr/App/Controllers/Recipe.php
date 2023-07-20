<?php
namespace App\Controllers;
use App\Config\View;

class Recipe {
    public function allRecipes() {
        $view = new View("Recipes/recipes", "front");
        // récupérer la data dans la bdd
    }
}