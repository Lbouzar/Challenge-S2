<?php

namespace App\Config;

class Verificator
{
    private array $data = [];
    public array $errors = [];
    private static $instances = [];

    private function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance()
    {
        $subClass = static::class;
        if (!isset(self::$instances[$subClass])) {
            self::$instances[$subClass] = new static();
        }
        return self::$instances[$subClass];
    }

    public function isSubmit(): bool
    {
        $this->data = ($this->method == "POST") ? $_POST : $_GET;
        if (!empty($_FILES)) {
            array_push($this->data, $_FILES);
        }
        return isset($this->data);
    }

    public function getData($key): string|array
    {
        return $this->data[$key];
    }

    public function isValid(): bool
    {
        if (count($this->config["inputs"]) != count($this->data) || $_SERVER['REQUEST_METHOD'] != $this->method) {
            $this->errors[] = " ";
        }
        foreach ($this->config["inputs"] as $name => $configInput) {
            if (isset($this->data[$name]) && $this->containsScriptTag($this->data[$name])) {
                $this->errors[] = "Les balises scripts sont interdites";
            }
            if (!isset($this->data[$name]) && $configInput["type"] != "file") {
                $this->errors[] = " ";
            } elseif (isset($configInput["required"]) && ($configInput["required"] == true) && self::isEmpty($this->data[$name])) {
                $this->errors[] = "Tous les champs sont obligatoires";
            } elseif (isset($configInput["min"]) && !self::isMinLength($this->data[$name], $configInput["min"])) {
                $this->errors[] = $configInput["error"];
            } elseif (isset($configInput["max"]) && !self::isMaxLength($this->data[$name], $configInput["max"])) {
                $this->errors[] = $configInput["error"];
            } elseif ($name == "email" && !self::checkEmail($this->data[$name])) {
                $this->errors[] = $configInput["error"];
            } elseif ($name == "pwd" && !self::isStrongPWD($this->data["pwd"])) {
                $this->errors[] = $configInput["error"];
            } elseif ($name == "pwdConfirm" && !self::isSamePWD($this->data["pwd"], $this->data[$name])) {
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

    public static function isStrongPWD(String $pwd): bool
    {
        if (preg_match('@[A-Z]@', $pwd) && preg_match('@[a-z]@', $pwd) && preg_match('@[0-9]@', $pwd) && preg_match('@[^\w]@', $pwd)) {
            return true;
        }

        return false;
    }

    public static function containsScriptTag(string $input): bool
    {
        $pattern = '/<script\b[^>]*>(.*?)<\/script>/is';
        return preg_match($pattern, $input) === 1;
    }
}
