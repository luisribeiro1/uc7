<?php

require_once "DataBase.php";

class Mesa
{

    # Criar um array associativo com a relação das mesas 
    // private $listaDeMesas = [
    //     ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares" => 2, "tipo" => "oval"],
    //     ["id" => 3, "lugares" => 6, "tipo" => "redonda"],
    //     ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //     ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //     ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //     ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //     ["id" => 8, "lugares" => 2, "tipo" => "redonda"],
    // ];

    # Criar um atributo privado para receber a conexão com o banco.
    private $db;

    # Método construtor da classe.
    public function __construct() {
        $this->db = DataBase::getconexao();
    }


    # Criar o método para retornar a lista de mesas 
    public function getAllmesas() {
        // return $this->listaDeMesas;
        $sql = $this->db->query("SELECT * FROM mesas");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}