<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Article;
use App\Models\Comment_Recipe;
use App\Models\Recipe;

class Dashboard
{
    private $recipe;
    private $article;
    private $comments;

    public function __construct()
    {
        $this->recipe = Recipe::getInstance();
        $this->article = Article::getInstance();
        $this->comments = Comment_Recipe::getInstance();
    }

    public function dashboard()
    {
        $view = View::getInstance("Dashboard/dashboard", "back");
        $view->assign("recipes", $this->recipe->getLatestData(3));
        $view->assign("articles", $this->article->getLatestData(3));
        $view->assign("comments", $this->comments->getLatestData(3));
    }

    public function homepage()
    {
        $view = View::getInstance("Dashboard/homepageBO", "back");
    }

    public function comments()
    {
        $view = View::getInstance("Dashboard/commentsBO", "back");
    }

    public function contact()
    {
        $view = View::getInstance("Dashboard/contactBO", "back");
    }
}
