<?php

namespace App\Controllers;

use App\Config\Image;
use App\Config\View;
use App\Models\Article;
use App\Forms\CreateArticle;
use App\Config\Session;
use App\Forms\UpdateArticle;
use App\Models\Menu;
use App\Models\Articlespage;
use App\Models\Article_History;

class Articles
{
    private $article;
    private $menu;
    private $articlespage;
    private $image;
    private $history;

    public function __construct()
    {
        $this->article = Article::getInstance();
        $this->menu = Menu::getInstance();
        $this->articlespage = Articlespage::getInstance();
        $this->image = Image::getInstance();
        $this->history = Article_History::getInstance();
    }
    public function allArticles()
    {
        $view = View::getInstance("Articles/articles", "front");
        // récupérer la data dans la bdd
        $view->assign("menu", $this->menu->selectWhere(["is_active" => 1]));
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
            $this->article->setContent($form->getData("content"));
            $this->article->setKeywords($form->getData("keywords"));
            if (!empty($form->getData("0")) && $this->image->addImage($form->getData("0"))) {
                $imagesInfo = $form->getData("0");
                $this->article->setImage($imagesInfo["logo"]["name"]);
            }
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
        $view->assign("history", $this->history->selectWhere(null));
        $oldVersion = $this->article->selectWhere(["id" => $_GET["id"]]);
        // die(print_r($oldVersion));
        $secondsWait = 2;

        if ($form->isSubmit() && $form->isValid()) {
            //vérification pour l'insertion dans l'historique
            die(print_r($_POST));
            self::addToHistory($oldVersion, $_POST);
            $this->article->setId($_GET["id"]);
            $this->article->setTitle($form->getData("title"));
            $this->article->setSlug($form->getData("slug"));
            $this->article->setContent($form->getData("content"));
            $this->article->setKeywords($form->getData("keywords"));
            if (!empty($form->getData("0")) && $this->image->addImage($form->getData("0"))) {
                $imagesInfo = $form->getData("0");
                $this->article->setImage($imagesInfo["logo"]["name"]);
            }
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

    public static function addToHistory($oldVersion, $newVersion): void 
    {
        $history = Article_History::getInstance();
        $history->setRecipe($oldVersion[0]["id"]);
        if($oldVersion[0]["title"]!= $newVersion) {
            $history->save();
        }
    }
}
