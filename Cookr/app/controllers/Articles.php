<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Article;

class Articles
{
    private $article;

    public function __construct()
    {
        $this->article = Article::getInstance();
    }
    public function allArticles()
    {
        $view = View::getInstance("Articles/articles", "front");
        // récupérer la data dans la bdd
        $view->assign('articles', $this->article->selectWhere(null));
    }

    public function article()
    {
        //route dynamique 
    }

    public function allArticlesBO()
    {
        $view = View::getInstance("Articles/articlesBO", "back");
    }

    public function  articleBO()
    {
        $view = View::getInstance("Articles/articleBO", "back");
        //route dynamique
    }
}
