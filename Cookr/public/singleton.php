<?php

class Ouais {

    private static $_instance = null;
    private function __construct() {
        echo "Je me connecte";
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return new self;
    }
}

$yes = Ouais::getInstance();
$yes = Ouais::getInstance();

//bitch wtf
// si une classe est instaciée, pas besoin de le refaire
// il faut que le construct soit appelé une fois et seulement une fois 