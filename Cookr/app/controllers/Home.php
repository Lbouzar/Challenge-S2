<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Article;
use App\Models\Recipe;

class Home
{

    private $recipe;
    private $article;

    public function __construct()
    {
        $this->recipe = Recipe::getInstance();
        $this->article = Article::getInstance();
    }
    public function index()
    {
        $view = View::getInstance("Home/home", "front");
        //récupérer dans la bdd les articles et recettes 
        $view->assign('mainRecipe', $this->recipe->selectWhere(["is_main" => 1]));
        $view->assign('recipes', $this->recipe->selectWhere(["is_main" => 0]));
        $view->assign('articles', $this->article->selectWhere(null));
    }
}
