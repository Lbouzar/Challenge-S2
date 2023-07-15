<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Article;
use App\Forms\CreateArticle;
use App\Config\Session;
use App\Forms\UpdateArticle;
use App\Models\Menu;
use App\Models\Articlespage;

class Articles
{
    private $article;
    private $menu;
    private $articlespage;

    public function __construct()
    {
        $this->article = Article::getInstance();
        $this->menu = Menu::getInstance();
        $this->articlespage = Articlespage::getInstance();
    }
    public function allArticles()
    {
        $view = View::getInstance("Articles/articles", "front");
        // récupérer la data dans la bdd
        $view->assign("menu", $this->menu->selectWhere(null));
        $view->assign("articlespage", $this->articlespage->selectWhere(null));
        $view->assign('articles', $this->article->selectWhere(["is_active" => 1]));
    }

    public function article()
    {
        //route dynamique 
    }

    public function allArticlesBO()
    {
        $view = View::getInstance("Articles/articlesBO", "back");
        $view->assign("articles", $this->article->selectWhere(["is_active" => 1]));
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
            $this->article->setCreator($session->id);
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

    public function delete(): void
    {
        if (count($this->article->selectWhere(["id" => $_GET["id"]])) > 0) {
            $this->article->setId($_GET["id"]);
            $this->article->delete();
    
            header("Location: articles-bo");
        } else {
            header("Location: articles-bo");
        }  
    }
}
