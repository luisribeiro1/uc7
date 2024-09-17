<?php

class Mesa 
{

 #criar um array associativa com a relaçao das mesas
    private $listaDeMesas = [
        ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
        ["id" => 2, "lugares" => 6, "tipo" => "oval"],
        ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
        ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
        ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
        ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
        ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
        ["id" => 8, "lugares" => 2, "tipo" => "redonda"],
        
    ];
    #criar o metodo para retornar a lista de mesas
    public function getAllMesas(){
        return $this->listaDeMesas;
    }
}
