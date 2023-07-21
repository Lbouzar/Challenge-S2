<?php 

namespace App\Forms;

use App\Config\Verificator;

class History extends Verificator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(array $data): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "",
                "enctype" => "multipart/form-data",
                "id" => "",
                "class" => "",
                "submit" => "Restaurer"
            ],
            "inputs" => [
                "versionId" => [
                    "type" => "select",
                    "options" => [],
                    "label" => "Restaurer une ancienne version"
                ]
            ]
        ];
        foreach($data as $history) {
            $this->config["inputs"]["versionId"]["options"][] = array (
                "value" => $history["id"],
                "name" => "Version du : ".$history["created_at"],
                "selected" => false
            );
        }
        return $this->config;
    }
}