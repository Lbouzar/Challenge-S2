<?php

namespace App\Controllers;

use App\Config\Image;
use App\Config\View;
use App\Forms\CreateRecipe;
use App\Forms\UpdateRecipe;
use App\Models\Recipe;
use App\Models\Menu;
use App\Models\Recipespage;

class Recipes
{
    private $recipe;
    private $menu;
    private $recipespage;
    private $image;

    public function __construct()
    {
        $this->recipe = Recipe::getInstance();
        $this->menu = Menu::getInstance();
        $this->recipespage = Recipespage::getInstance();
        $this->image = Image::getInstance();
    }
    public function allRecipes()
    {
        $view = View::getInstance("Recipes/recipes", "front");
        // récupérer la data dans la bdd
        $view->assign("menu", $this->menu->selectWhere(["is_active" => 1]));
        $view->assign("recipespage", $this->recipespage->selectWhere(null));
        $view->assign('recipes', $this->recipe->selectWhere(["is_active" => 1]));
    }

    public function recipe()
    {
        //route dynamique
    }

    public function allRecipesBO()
    {
        $view = View::getInstance("Recipes/recipesBO", "back");
        $view->assign('recipes', $this->recipe->selectWhere(["is_active" => 1]));
    }

    public function createRecipe()
    {
        $form = CreateRecipe::getInstance();
        $view = View::getInstance("Recipes/createRecipes", "back");
        $view->assign('form', $form->getConfig());
        if ($form->isSubmit() && $form->isValid()) {
            $this->recipe->setTitle($form->getData("title"));
            $this->recipe->setSlug($form->getData("slug"));
            $this->recipe->setIsActive($form->getData("is_active"));
            $this->recipe->setPreparationTime($form->getData("preparation_time"));
            $this->recipe->setCookingTime($form->getData("cooking_time"));
            $this->recipe->setPrice($form->getData("price"));
            $this->recipe->setPresentation($form->getData("presentation"));
            $this->recipe->setIngredients($form->getData("ingredients"));
            $this->recipe->setDescription($form->getData("description"));
            if (!empty($form->getData("0")) && $this->image->addImage($form->getData("0"))) {
                $imagesInfo = $form->getData("0");
                $this->recipe->setImage($imagesInfo["logo"]["name"]);
            }
            $this->recipe->save();
            $form->errors[] = "La recette a été créée";
        }
        $view->assign("formErrors", $form->errors);
    }

    public function recipeBO()
    {
        //route dynamique 
        $form = UpdateRecipe::getInstance();
        $view = View::getInstance("Recipes/recipeBO", "back");
        $view->assign("form", $form->getConfig($this->recipe->selectWhere(["id" => $_GET["id"]])));

        $secondsWait = 2;

        if ($form->isSubmit() && $form->isValid()) {
            $this->recipe->setId($_GET["id"]);
            $this->recipe->setTitle($form->getData("title"));
            $this->recipe->setSlug($form->getData("slug"));
            $this->recipe->setIsActive($form->getData("is_active"));
            $this->recipe->setPreparationTime($form->getData("preparation_time"));
            $this->recipe->setCookingTime($form->getData("cooking_time"));
            $this->recipe->setPrice($form->getData("price"));
            $this->recipe->setPresentation($form->getData("presentation"));
            $this->recipe->setIngredients($form->getData("ingredients"));
            $this->recipe->setDescription($form->getData("description"));
            if (!empty($form->getData("0")) && $this->image->addImage($form->getData("0"))) {
                $imagesInfo = $form->getData("0");
                $this->recipe->setImage($imagesInfo["logo"]["name"]);
            }
            $this->recipe->save();
            $form->errors[] = "Mise à jour de la recette";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }

    public function delete(): void
    {
        if (count($this->recipe->selectWhere(["id" => $_GET["id"]])) > 0) {
            $this->recipe->setId($_GET["id"]);
            $this->recipe->delete();
    
            header("Location: recipes-bo");
        } else {
            header("Location: recipes-bo");
        }
    }
}
