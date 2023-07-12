<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Article;
use App\Forms\CreateArticle;
use App\Config\Session;
use App\Forms\UpdateArticle;

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
        $view->assign("articles", $this->article->selectWhere(null));
    }

    public function createArticle()
    {
        $session = Session::getInstance();
        $form = createArticle::getInstance();
        $view = View::getInstance("Articles/createArticles", "back");
        $view->assign('form', $form->getConfig());
        if ($form->isSubmit() && $form->isValid()) {
            $this->article->setTitle($form->getData("title"));
            $this->article->setSlug($form->getData("slug"));
            $this->article->setUser($session->id);
            // $this->article->setContent();
            $this->article->setKeywords($form->getData("keywords"));
            $this->article->save();
            $form->errors[] = "L'article a été créée";
        }
        $view->assign("formErrors", $form->errors);
    }

    public function  articleBO()
    {
        //route dynamique
        $form = UpdateArticle::getInstance();
        $view = View::getInstance("Articles/articleBO", "back");
        $view->assign("form", $form->getConfig($this->article->selectWhere(["id" => $_GET["id"]])));

        $secondsWait = 2;

        if ($form->isSubmit() && $form->isValid()) {
            $this->article->setId($_GET["id"]);
            $this->article->setTitle($form->getData("title"));
            $this->article->setSlug($form->getData("slug"));
            // $this->article->setContent();
            $this->article->setKeywords($form->getData("keywords"));
            $this->article->save();
            $form->errors[] = "Mise à jour de l'article";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }
}
