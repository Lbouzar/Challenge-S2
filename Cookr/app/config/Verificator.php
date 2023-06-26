<?php

namespace App\Config;

class Verificator
{
    private array $data = [];
    public array $errors = [];

    public function isSubmit(): bool
    {
        $this->data = ($this->method == "POST") ? $_POST : $_GET;
        if (isset($this->data["submit"])) {
            return true;
        }
        return false;
    }

    public function isValid(): bool
    {
        if ($_SERVER["REQUEST_METHOD"] != $this->method) {
            die("Tentative de Hack");
        }

        if (count($this->config["inputs"]) + 1 != count($this->data)) {
            die("Tentative de Hack");
        }

        foreach ($this->config["inputs"] as $name => $configInput) {
            if (!isset($this->data[$name])) {
                die("Tentative de Hack");
            }
            if (isset($configInput["required"]) && self::isEmpty($this->data[$name])) {
                die("Tentative de Hack");
            }
            if (isset($configInput["min"]) && !self::isMinLength($this->data[$name], $configInput["min"])) {
                $this->errors[] = $configInput["error"];
            }
            if (isset($configInput["max"]) && !self::isMaxLength($this->data[$name], $configInput["max"])) {
                $this->errors[] = $configInput["error"];
            }
            
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public static function isEmpty(String $string): bool
    {
        return empty(trim($string));
    }

    public static function isMinLength(String $string, $length): bool
    {
        return strlen(trim($string)) >= $length;
    }

    public static function isMaxLength(String $string, $length): bool
    {
        return strlen(trim($string)) <= $length;
    }

    public static function checkEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}