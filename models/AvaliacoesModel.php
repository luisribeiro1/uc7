<?php
require_once "DataBase.php";

class avaliacoes{
    #Criar um array associativo com a relação das mesas
    // private $listaDeMesas = [
    //     ["id" => 1, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares"=> 6, "tipo" => "oval"],
    //     ["id" => 3, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 4, "lugares"=> 8, "tipo" => "retangular"],
    //     ["id" => 5, "lugares"=> 2, "tipo" => "redonda"],
    //     ["id" => 6, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 7, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 8, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 9, "lugares"=>6, "tipo" => "canto alemão"],
    //     ["id" => 10, "lugares"=>6, "tipo" => "canto alemão"],
    //     ["id" => 11, "lugares"=>6, "tipo" => "canto alemão"],
    //     ["id" => 12, "lugares"=>6, "tipo" => "canto alemão"],
    // ];

    # Criar um atributo privado para receber a conexão com o banco
    private $db;

    # Criar o método da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de mesas
    public function getAllAvaliacoes(){
        // return $this->listaDeMesas;
        
        # Executa o código SQL no banco de dados atravez do método query. O método query é usado para consulta, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM avaliacoes");
        # Retorna um Array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    # executar o SQL para remover o registro de uma mesa
    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM avaliacoes WHERE idAvaliacao = ?");
        return $sql->execute([$id]);
    }

    public function aprovar($id){
        $sql = $this->db->prepare("UPDATE avaliacoes SET situacao=? WHERE IdAvaliacao=?");
        return $sql->execute(['ok',$id]);
    }

}