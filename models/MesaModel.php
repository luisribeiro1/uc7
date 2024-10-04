<?php

# Inclui o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Mesa{
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

    # método construtor da classe. Ele será executado, quando a classe for instanciada
    public function __construct(){
        # Executa o método estático para estabelecer a conexão com o banco de dados
        // Método estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }

    

    # Criar o método para retornar a lista de mesas
    public function getAllMesas(){
        // return $this->listaDeMesas;

        # Executa o código SQL no banco de dados atravez do método query. O método query é usado para consulta, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");
        # Retorna um Array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    # executar o SQL para remover o registro de uma mesa
    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
        return $sql->execute([$id]);
    }

    public function insert($mesa,$lugares,$tipo){
        $sql = $this->db->prepare(
            "INSERT INTO mesas (id,lugares,tipo)
            VALUES (?,?,?)"
        );
        return $sql->execute([$mesa,$lugares,$tipo]);
    }
}