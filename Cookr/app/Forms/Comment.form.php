<?php

namespace App\Forms;

use App\Config\Verificator;

class Comment extends Verificator
{
  protected $method = "POST";
  protected array $config = [];

  public function getConfig(): array
  {
    return $this->config = [
      "config" => [
        "method" => $this->method,
        "action" => "",
        "enctype" => "",
        "id" => "",
        "class" => "",
        "submit" => "Envoyer",
      ],
      "inputs" => [
        "message" => [
          "type" => "textarea",
          "class" => "text-area",
          "minlength" => 2,
          "maxlength" => 300,
          "cols" => 30,
          "rows" => 7,
          "required" => true,
          "label" => "Votre commentaire",
          "placeholder" => "Écrivez un commentaire"
        ]
      ]
    ];
  }
}
