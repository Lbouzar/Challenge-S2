<?php
namespace App\Controllers;
use App\Config\View;

class Article {
    public function allArticles() {
        $view = new View("Articles/articles", "front");
        // récupérer la data dans la bdd
    }
}