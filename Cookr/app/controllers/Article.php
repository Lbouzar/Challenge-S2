<?php
namespace App\Controllers;
use App\Config\View;

class Article {
    public function allArticles() {
        $view = View::getInstance("Articles/articles", "front");
        // récupérer la data dans la bdd
    }
}