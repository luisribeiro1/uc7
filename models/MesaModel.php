<?php

class Mesa
{
    #Criar um array associativo com a relação das mesas
    private $listaDeMesas = [
        ["id" => 1, "lugares"=> 4, "tipo" => "quadrada"],
        ["id" => 2, "lugares"=> 6, "tipo" => "oval"],
        ["id" => 3, "lugares"=> 4, "tipo" => "quadrada"],
        ["id" => 4, "lugares"=> 8, "tipo" => "retangular"],
        ["id" => 5, "lugares"=> 2, "tipo" => "redonda"],
        ["id" => 6, "lugares"=> 4, "tipo" => "quadrada"],
        ["id" => 7, "lugares"=> 4, "tipo" => "quadrada"],
        ["id" => 8, "lugares"=> 4, "tipo" => "quadrada"],
        ["id" => 9, "lugares"=>6, "tipo" => "canto alemão"],
        ["id" => 10, "lugares"=>6, "tipo" => "canto alemão"],
        ["id" => 11, "lugares"=>6, "tipo" => "canto alemão"],
        ["id" => 12, "lugares"=>6, "tipo" => "canto alemão"],
    ];

    # Criar o método para retornar a lista de mesas
    public function getAllMesas(){
        return $this->listaDeMesas;
    }

}