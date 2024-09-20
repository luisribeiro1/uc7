<?php

require_once "DataBase.php";
class Mesa 
{
    # Criar um array associativo com a relação das mesas
    // private $listaDeMesas = [
    //     ['id' => 1, 'lugares' => 4, 'tipo' => "quadrada"],
    //     ['id' => 2, 'lugares' => 6, 'tipo' => "oval"],
    //     ['id' => 3, 'lugares' => 4, 'tipo' => "quadrada"],
    //     ['id' => 4, 'lugares' => 8, 'tipo' => "retangular"],
    //     ['id' => 5, 'lugares' => 2, 'tipo' => "redonda"],
    // ];

    # Criar um atributo privado para receber a conexão com o banco
    private $db;


    # Método construtor da classe 
    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de mesas
    public function  getAllMesas(){
        // return $this->listaDeMesas;

        $sql = $this->db->query("SELECT * FROM mesas");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
