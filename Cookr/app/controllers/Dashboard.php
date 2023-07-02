<?php
namespace App\Controllers;
use App\Config\View; 

class Dashboard {
    public function dashboard() {
        $view = View::getInstance("Dashboard/dashboard", "back");
    }

    public function homepage() {
        $view = View::getInstance("Dashboard/homepageBO", "back");
    }

    public function comments() {
        $view = View::getInstance("Dashboard/commentsBO", "back");
    }

    public function contact() {
        $view = View::getInstance("Dashboard/contactBO", "back");
    }
}