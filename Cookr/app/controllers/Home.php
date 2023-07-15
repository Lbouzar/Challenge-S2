<?php

namespace App\Controllers;

use App\Config\View;
use App\Forms\CreateHomepage;
use App\Forms\UpdateHomepage;
use App\Models\Article;
use App\Models\Recipe;
use App\Models\Menu;
use App\Models\Homepage;

class Home
{

    private $recipe;
    private $article;
    private $menu;
    private $homepage;

    public function __construct()
    {
        $this->recipe = Recipe::getInstance();
        $this->article = Article::getInstance();
        $this->menu = Menu::getInstance();
        $this->homepage = Homepage::getInstance();
    }
    public function index()
    {
        $view = View::getInstance("Home/home", "front");
        //récupérer dans la bdd les articles et recettes
        $view->assign("menu", $this->menu->selectWhere(null));
        $view->assign("homepage", $this->homepage->selectWhere(null));
        $view->assign('recipes', $this->recipe->getLatestDataWhere(["is_active" => 1]));
        $view->assign('articles', $this->article->getLatestDataWhere(["is_active" => 1]));
    }

    public function homepage()
    {
        $form = UpdateHomepage::getInstance();
        $view = View::getInstance("Home/homepage", "back");
        $view->assign('homepage', $this->homepage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->homepage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->homepage->setId(1);
            $this->homepage->setSlogan($form->getData("slogan"));
            $this->homepage->setFirsttitle($form->getData("firsttitle"));
            $this->homepage->setSecondtitle($form->getData("secondtitle"));
            $this->homepage->save();
            $form->errors[] = "Mise à jour de la page";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createHomepage()
    {
        if (count($this->homepage->selectWhere(null)) > 0) {
            header("Location: homepage");
        } else {
            $form = CreateHomepage::getInstance();
            $view = View::getInstance("Home/createHomepage", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->homepage->setSlogan($form->getData("slogan"));
                $this->homepage->setFirsttitle($form->getData("firsttitle"));
                $this->homepage->setSecondtitle($form->getData("secondtitle"));
                $this->homepage->save();
                header("Location: homepage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }
}
