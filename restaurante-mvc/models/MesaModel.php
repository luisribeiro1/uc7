<?php

class Mesa
{

# Criar um array associativa com a relaçaõ das mesas
    private $listaDeMesas = [
        ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
        ["id" => 2, "lugares" => 6, "tipo" => "oval"],
        ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
        ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
        ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    ];

    public function getAllMesas(){
        return $this->listaDeMesas;
    }


}

