<?php

class Mesa
{
    # Criar um array associativo com a relação das mesas
    private $listaDeMesas = [
        ["id" => 1, "lugares" => 4, "tipo" => "Quadrada"],
        ["id" => 2, "lugares" => 6, "tipo" => "Oval"],
        ["id" => 3, "lugares" => 4, "tipo" => "Quadrada"],
        ["id" => 4, "lugares" => 8, "tipo" => "Retangular"],
        ["id" => 5, "lugares" => 2, "tipo" => "Redonda"],
        ["id" => 6, "lugares" => 6, "tipo" => "Quadrada"],
        ["id" => 7, "lugares" => 8, "tipo" => "Oval"],
        ["id" => 8, "lugares" => 2, "tipo" => "Quadrada"],
    ];

    # Criar o método para retornar a lista de mesas
    public function getAllMesas(){
        return $this->listaDeMesas; 
    }

}