<?php

namespace App\Config;

class Image 
{
    private static $instance;
    private $target_dir;

    private function __construct()
    {
        $this->target_dir = dirname(__DIR__, 2) . '/public/assets/images/';
    }

    public static function getInstance(): Image
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function addImage(array $imagesInfo): bool
    {
        $this->target_dir .= basename($imagesInfo["logo"]["name"]);
        if (move_uploaded_file($imagesInfo["logo"]["tmp_name"], $this->target_dir)){
            return true;
        }
        return false;
    }
}