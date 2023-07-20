<?php

namespace App\Config;

class Verificator
{
    private array $data = [];
    public array $errors = [];

    public function isSubmit(): bool
    {
        $this->data = ($this->method == "POST") ? $_POST : $_GET;
        return isset($this->data);
    }

    public function getData($key): string
    {
        return $this->data[$key];
    }

    public function isValid(): bool
    {
        if ($this->method != $_SERVER["REQUEST_METHOD"])
            die("Tentative de Hack");
        if (count($this->config["inputs"]) != count($this->data))
            die("Tentative de Hack");

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
            if ($name == "email" && !self::checkEmail($this->data[$name])) {
                $this->errors[] = $configInput["error"];
            }
            if ($name == "pwdConfirm" && !self::isSamePWD($this->data["pwd"], $this->data[$name])) {
                $this->errors[] = $configInput["error"];
            }
        }
        return empty($this->errors);
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

    public static function isSamePWD(String $pwd, String $pwdConfirm): bool
    {
        return $pwd == $pwdConfirm;
    }
}
