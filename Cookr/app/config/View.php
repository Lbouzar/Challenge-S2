<?php

namespace App\Config;

class View
{

    private String $view;
    private String $template;
    private $data = [];
    private static $instance;

    private function __construct(string $view, string $template)
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public static function getInstance(string $view, string $template): View
    {
        if (!self::$instance) {
            self::$instance = new self($view, $template);
        }
        return self::$instance;
    }

    public function assign(String $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function setView(String $view): void
    {
        $view = dirname(__DIR__). '/views/'.trim($view) . ".view.php";
        if (!file_exists($view)) {
            die("La vue " . $view . " n'existe pas");
        }
        $this->view = $view;
    }

    public function setTemplate(String $template): void
    {
        $template = dirname(__DIR__). '/views/'.trim($template) . ".tpl.php";
        if (!file_exists($template)) {
            die("Le template " . $template . " n'existe pas");
        }
        $this->template = $template;
    }

    public function modal($name, $config): void
    {
        include dirname(__DIR__). '/views/Modals/'.trim($name) . ".modal.php";
    }

    public function __destruct()
    {
        extract($this->data);
        include $this->template;
    }
}
