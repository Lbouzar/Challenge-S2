<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Recipe;

class Recipes
{
    private $recipe;

    public function __construct()
    {
        $this->recipe = Recipe::getInstance();
    }
    public function allRecipes()
    {
        $view = View::getInstance("Recipes/recipes", "front");
        // récupérer la data dans la bdd
        $view->assign('mainRecipe', $this->recipe->selectWhere(["is_main" => 1]));
        $view->assign('recipes', $this->recipe->selectWhere(["is_main" => 0]));
        
    }
}
