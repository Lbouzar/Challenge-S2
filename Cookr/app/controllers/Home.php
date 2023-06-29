<?php
namespace App\Controllers;
use App\Config\View;
use App\Emails\Email;

class Home {

    private $email;

    public function __construct()
    {
        $this->email = Email::getInstance();
    }
    public function index() {
        $view = View::getInstance("Home/home", "front");
        //récupérer dans la bdd les articles et recettes 
        // voir template Figma 
    }
}