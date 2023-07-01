<?php
namespace App\Controllers;
use App\Config\View; 

class ArticlesBO {
    public function articlesBO() {
        $view = new View("ArticlesBO/articlesBO", "back");
        //récupérer dans la bdd les articles et recettes 
        // voir template Figma 
    }
}