<?php
require_once "DataBase.php";

class Avaliacoes
{

 #criar um array associativa com a relaçao das mesas
    // private $listaDeMesas = [
    //     ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //     ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //     ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //     ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //     ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //     ["id" => 8, "lugares" => 2, "tipo" => "redonda"],
        
    // ];

    # Criar um atributo privado para receber a conexao com o banco
    private $db;
    # Metodo construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    #criar o metodo para retornar a lista de mesas
    public function getAllAvaliacoes(){
       // return $this->listaDeMesas;
       $sql = $this->db->query("SELECT * FROM avaliacoes");
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
