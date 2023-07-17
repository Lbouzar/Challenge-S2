<?php

namespace App\Controllers;

use App\Config\View;
use App\Forms\CreateMenu;
use App\Forms\CreateRecipespage;
use App\Forms\CreateArticlespage;
use App\Forms\CreateContact;
use App\Forms\CreateLogin;
use App\Forms\CreateProfil;
use App\Forms\CreateRegister;
use App\Forms\UpdateMenu;
use App\Forms\UpdateRecipespage;
use App\Forms\UpdateArticlespage;
use App\Forms\UpdateContact;
use App\Forms\UpdateLogin;
use App\Forms\UpdateProfil;
use App\Forms\UpdateRegister;
use App\Forms\Settings;
use App\Models\Article;
use App\Models\Comment_Recipe;
use App\Models\Menu;
use App\Models\Recipe;
use App\Models\Recipespage;
use App\Models\Articlespage;
use App\Models\Contactpage;
use App\Models\Loginpage;
use App\Models\Profilpage;
use App\Models\Registerpage;

class Dashboard
{
    private $recipe;
    private $article;
    private $comments;
    private $menu;
    private $recipespage;
    private $articlespage;
    private $contactpage;
    private $registerpage;
    private $loginpage;
    private $profilpage;
    private $settings;

    public function __construct()
    {
        $this->recipe = Recipe::getInstance();
        $this->article = Article::getInstance();
        $this->comments = Comment_Recipe::getInstance();
        $this->menu = Menu::getInstance();
        $this->recipespage = Recipespage::getInstance();
        $this->articlespage = Articlespage::getInstance();
        $this->contactpage = Contactpage::getInstance();
        $this->registerpage = Registerpage::getInstance();
        $this->loginpage = Loginpage::getInstance();
        $this->profilpage = Profilpage::getInstance();
        $this->settings = Settings::getInstance();
    }

    public function dashboard()
    {
        $view = View::getInstance("Dashboard/dashboard", "back");
        $view->assign("recipes", $this->recipe->getLatestData(3));
        $view->assign("articles", $this->article->getLatestData(3));
        $view->assign("comments", $this->comments->getLatestData(3));
    }

    public function menu()
    {
        $view = View::getInstance("Dashboard/menu", "back");
        $view->assign('menu', $this->menu->selectWhere(null));
    }

    public function createMenu()
    {
        $form = CreateMenu::getInstance();
        $view = View::getInstance("Dashboard/createMenu", "back");
        $view->assign("form", $form->getConfig());
        if ($form->isSubmit() && $form->isValid()) {
            $this->menu->setTitle($form->getData("title"));
            $this->menu->setRoute($form->getData("link_route"));
            $this->menu->setIsActive($form->getData("is_active"));
            $this->menu->save();
            $form->errors[] = "Le menu a été créé";
        }
        $view->assign("formErrors", $form->errors);
    }

    public function updateMenu()
    {
        $form = UpdateMenu::getInstance();
        $view = View::getInstance("Dashboard/updateMenu", "back");
        $view->assign('form', $form->getConfig($this->menu->selectWhere(["id" => $_GET["id"]])));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->menu->setId($_GET["id"]);
            $this->menu->setTitle($form->getData("title"));
            $this->menu->setRoute($form->getData("link_route"));
            $this->menu->setIsActive($form->getData("is_active"));
            $this->menu->save();
            $form->errors[] = "Mise à jour du menu";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function deleteMenu()
    {
        if (count($this->menu->selectWhere(["id" => $_GET["id"]])) > 0) {
            $this->menu->setId($_GET["id"]);
            $this->menu->delete();

            header("Location: menu");
        } else {
            header("Location: menu");
        }
    }

    public function recipespage()
    {
        $form = UpdateRecipespage::getInstance();
        $view = View::getInstance("Recipes/recipespage", "back");
        $view->assign('recipespage', $this->recipespage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->recipespage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->recipespage->setId(1);
            $this->recipespage->setTitle($form->getData("title"));
            $this->recipespage->save();
            $form->errors[] = "Mise à jour de la page";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createRecipespage()
    {
        if (count($this->recipespage->selectWhere(null)) > 0) {
            header("Location: recipespage");
        } else {
            $form = CreateRecipespage::getInstance();
            $view = View::getInstance("Recipes/createRecipespage", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->recipespage->setTitle($form->getData("title"));
                $this->recipespage->save();
                header("Location: recipespage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function articlespage()
    {
        $form = UpdateArticlespage::getInstance();
        $view = View::getInstance("Articles/articlespage", "back");
        $view->assign('articlespage', $this->articlespage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->articlespage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->articlespage->setId(1);
            $this->articlespage->setTitle($form->getData("title"));
            $this->articlespage->save();
            $form->errors[] = "Mise à jour de la page";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createArticlespage()
    {
        if (count($this->articlespage->selectWhere(null)) > 0) {
            header("Location: articlespage");
        } else {
            $form = CreateArticlespage::getInstance();
            $view = View::getInstance("Articles/createArticlespage", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->articlespage->setTitle($form->getData("title"));
                $this->articlespage->save();
                header("Location: articlespage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function contact()
    {
        $form = UpdateContact::getInstance();
        $view = View::getInstance("Dashboard/contactBO", "back");
        $view->assign('contactpage', $this->contactpage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->contactpage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->contactpage->setId(1);
            $this->contactpage->setTitle($form->getData("title"));
            $this->contactpage->setContent($form->getData("content"));
            $this->contactpage->save();
            $form->errors[] = "Mise à jour de la page";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createContactpage()
    {
        if (count($this->contactpage->selectWhere(null)) > 0) {
            header("Location: contactpage");
        } else {
            $form = CreateContact::getInstance();
            $view = View::getInstance("Dashboard/createContact", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->contactpage->setTitle($form->getData("title"));
                $this->contactpage->setContent($form->getData("content"));
                $this->contactpage->save();
                header("Location: contactpage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function register()
    {
        $form = UpdateRegister::getInstance();
        $view = View::getInstance("Dashboard/registerBO", "back");
        $view->assign('registerpage', $this->registerpage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->registerpage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->registerpage->setId(1);
            $this->registerpage->setTitle($form->getData("title"));
            $this->registerpage->setLink($form->getData("link_title"));
            $this->registerpage->setRoute($form->getData("link_route"));
            $this->registerpage->save();
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createRegister()
    {
        if (count($this->registerpage->selectWhere(null)) > 0) {
            header("Location: registerpage");
        } else {
            $form = CreateRegister::getInstance();
            $view = View::getInstance("Dashboard/createRegister", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->registerpage->setTitle($form->getData("title"));
                $this->registerpage->setLink($form->getData("link_title"));
                $this->registerpage->setRoute($form->getData("link_route"));
                $this->registerpage->save();
                header("Location: registerpage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function login()
    {
        $form = UpdateLogin::getInstance();
        $view = view::getInstance("Dashboard/loginBO", "back");
        $view->assign('loginpage', $this->loginpage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->loginpage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->loginpage->setId(1);
            $this->loginpage->setTitle($form->getData("title"));
            $this->loginpage->setLink($form->getData("link_title"));
            $this->loginpage->setRoute($form->getData("link_route"));
            $this->loginpage->save();
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createLogin()
    {
        if (count($this->loginpage->selectWhere(null)) > 0) {
            header("Location: loginpage");
        } else {
            $form = CreateLogin::getInstance();
            $view = View::getInstance("Dashboard/createLogin", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->loginpage->setTitle($form->getData("title"));
                $this->loginpage->setLink($form->getData("link_title"));
                $this->loginpage->setRoute($form->getData("link_route"));
                $this->loginpage->save();
                header("Location: loginpage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function profil()
    {
        $form = UpdateProfil::getInstance();
        $view = view::getInstance("Dashboard/profilBO", "back");
        $view->assign('profilpage', $this->profilpage->selectWhere(null));
        $view->assign('form', $form->getConfig($this->profilpage->selectWhere(null)));
        $secondsWait = 2;
        if ($form->isSubmit() && $form->isValid()) {
            $this->profilpage->setId(1);
            $this->profilpage->setFirsttitle($form->getData("title1"));
            $this->profilpage->setSecondtitle($form->getData("title2"));
            $this->profilpage->setLasttitle($form->getData("title3"));
            $this->profilpage->save();
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function createProfil()
    {
        if (count($this->profilpage->selectWhere(null)) > 0) {
            header("Location: profilpage");
        } else {
            $form = CreateProfil::getInstance();
            $view = View::getInstance("Dashboard/createProfil", "back");
            $view->assign("form", $form->getConfig());
            if ($form->isSubmit() && $form->isValid()) {
                $this->profilpage->setFirsttitle($form->getData("title1"));
                $this->profilpage->setSecondtitle($form->getData("title2"));
                $this->profilpage->setLasttitle($form->getData("title3"));
                $this->profilpage->save();
                header("Location: profilpage");
            }
            $view->assign("formErrors", $form->errors);
        }
    }

    public function comments()
    {
        $view = View::getInstance("Dashboard/commentsBO", "back");
        $view->assign("comments", $this->comments->selectWhere(null));
    }

    public function deleteComment()
    {
        if (count($this->comments->selectWhere(["id" => $_GET["id"]])) > 0) {
            $this->comments->setId($_GET["id"]);
            $this->comments->delete();

            header("Location: comments-bo");
        } else {
            header("Location: comments-bo");
        }
    }

    public function settings()
    {
        $form = Settings::getInstance();
        $view = View::getInstance("Dashboard/settings", "back");
        $view->assign('settings', $this->settings->selectWhere(null));
        $view->assign('form', $form->getConfig($this->settings->selectWhere(null)));
    }
}
