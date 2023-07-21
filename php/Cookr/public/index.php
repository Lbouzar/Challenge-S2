<?php

namespace App;

use App\Config\View;
//use App\Config\Session;

$uriExploded = explode("?",$_SERVER["REQUEST_URI"]);
$uri = rtrim(strtolower(trim($uriExploded[0])),"/");

if($uri === '/installer'){
    $_POST = json_decode(file_get_contents("php://input"), true);
    include('../App/installer.php');
}else{
spl_autoload_register(function ($class) {
    $class = dirname(__DIR__) . "/" . str_replace("\\", "/", $class);

    //Config files
    $config = $class . ".php";

    //Forms files
    $form = $class . ".form.php";

    if (file_exists($config)) {
        include $config;
    } else if (file_exists($form)) {
        include $form;
    }
});


//Récupérer dans l'url l'uri /login ou /user/toto
//Nettoyer la donnée
//S'il y a des paramètres dans l'url il faut les enlever :
$uriExploded = explode("?", $_SERVER["REQUEST_URI"]);

$uri = rtrim(strtolower(trim($uriExploded[0])), "/");
$uriParameters = isset($uriExploded[1]) ? explode("&",$uriExploded[1]) : null;

//Dans le cas ou nous sommes à la racine $uri sera vide du coup je remets /
$uri = (empty($uri)) ? "/" : $uri;
// $slug = isset($uriParameters) ? explode("slug=", $uriParameters[0])[1] : null;
// $id = isset($uriParameters) ? explode("id=", $uriParameters[1])[1] : null;

//Créer un fichier yaml contenant le route du type :
// /login:
//      controller: Security
//      action: login
//Le fichier est dans www et porte le nom de routes.yml

//En fonction de l'uri récupérer le controller et l'action
//Effectuer toutes les vérifications que vous estimez nécessaires
//En cas d'erreur effectuer un simple Die avec un message explicite
//Dans le cas ou tout est bon créer une instance du controller
//et appeler la methode action

//Exemple :
// $controller = new Security();
// $controller->login();

if (!file_exists("../App/Config/routes.yml")) {
    die("Le fichier de routing n'existe pas");
}
$session = Session::getInstance();
$routes = yaml_parse_file("../App/Config/routes.yml");

if (!isset($routes[$uri]["controller"]) || !isset($routes[$uri]["action"]) || empty($routes[$uri]) || empty($routes[$uri]["controller"]) || empty($routes[$uri]["action"])) {
    http_response_code(404);
    View::getInstance("404/404", "front");
} else {
    $controller = $routes[$uri]["controller"];
    $action = $routes[$uri]["action"];

    //Vérification de l'existance de la classe
    if (!file_exists("../App/Controllers/" . $controller . ".php")) {
        die("Le fichier Controllers/" . $controller . ".php n'existe pas");
    }
    include "../App/Controllers/" . $controller . ".php";

    //Le fichier existe mais est-ce qu'il possède la bonne classe
    //bien penser à ajouter le namespace \App\Controllers\Security
    $controller = "App\\Controllers\\" . $controller;

    if (!class_exists($controller)) {
        die("La class " . $controller . " n'existe pas");
    }

    $objet = new $controller();

    //Est-ce que l'objet contient bien la methode
    if (!method_exists($objet, $action)) {
        die("L'action " . $action . " n'existe pas");
    }

    if (isset($routes[$uri]["roles"])) {
        $roles = $routes[$uri]["roles"];
        $isAuthorized = false;
        foreach ($roles as $role) {
            if ($session->role == getenv($role)) {
                $isAuthorized = true;
                break;
            }
        }
        if ($isAuthorized) {
            $objet->$action();
        } else {
            http_response_code(404);
            View::getInstance("404/404", "front");
        }
    } else {
        $objet->$action();
    }
}
}
