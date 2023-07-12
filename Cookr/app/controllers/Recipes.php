<?php

namespace App\Controllers;

use App\Config\View;
use App\Forms\CreateRecipe;
use App\Forms\UpdateRecipe;
use App\Models\Recipe;

class Recipes
{
    private $recipe;
    private $urlData;

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

    public function recipe()
    {
        //route dynamique
    }

    public function allRecipesBO()
    {
        $view = View::getInstance("Recipes/recipesBO", "back");
        $view->assign('recipes', $this->recipe->selectWhere(null));
    }

    public function createRecipe()
    {
        $form = CreateRecipe::getInstance();
        $view = View::getInstance("Recipes/createRecipes", "back");
        $view->assign('form', $form->getConfig());

        if ($form->isSubmit() && $form->isValid()) {
            $this->recipe->setTitle($form->getData("title"));
            $this->recipe->setSlug($form->getData("slug"));
            $this->recipe->setDifficulty($form->getData("difficulty"));
            $this->recipe->setIsMain($form->getData("is_main"));
            $this->recipe->setPreparationTime($form->getData("preparation_time"));
            $this->recipe->setCookingTime($form->getData("cooking_time"));
            $this->recipe->setPrice($form->getData("price"));
            $this->recipe->setPresentation($form->getData("presentation"));
            $this->recipe->setIngredients($form->getData("ingredients"));
            $this->recipe->setDescription($form->getData("description"));
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
            $this->recipe->setDifficulty($form->getData("difficulty"));
            $this->recipe->setIsMain($form->getData("is_main"));
            $this->recipe->setPreparationTime($form->getData("preparation_time"));
            $this->recipe->setCookingTime($form->getData("cooking_time"));
            $this->recipe->setPrice($form->getData("price"));
            $this->recipe->setPresentation($form->getData("presentation"));
            $this->recipe->setIngredients($form->getData("ingredients"));
            $this->recipe->setDescription($form->getData("description"));
            $this->recipe->save();
            $form->errors[] = "Mise à jour de la recette";
            header("Refresh:$secondsWait");
        }
        $view->assign("formErrors", $form->errors);
    }
}
