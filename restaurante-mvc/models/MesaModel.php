<?php

// incluir o arquivo com a conexeção com o banco de dados 
require_once "DataBase.php";

class Mesa

{

# Criar um array associativa com a relaçaõ das mesas
    //  private $listaDeMesas = [
    //      ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //     ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //      ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //  ];

    # Criar um atributo privado
    private $db;

    # Método construtor da classe. ele sera executado, quando a classe for instanciada.
    public function __construct(){

        // executa o método estatico para estabelecer a conexão com o banco de dados
        // método estatico é aquele que não precisa ser instalado
        $this->db = DataBase::getConexao();
    }
   





    public function getAllMesas(){
       // return $this->listaDeMesas;

       // execute o codigo SQL no banco de dados atraves do metodo query
       // o metodo query é usado para consultar, ou seja, quando usar SELECT
       $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");

       // retorna um array associativo com o resultado da consulta
       return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
     }

    // executar o SQL para remover o registro de uma mesa
    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
        return $sql->execute([$id]);
    }

    public function insert($id,$lugares,$tipo){
        $sql = $this->db->prepare(
            "INSERT INTO mesas (id,lugares,tipo)
            VALUES (?,?,?)"
            );
            return $sql->execute( [$id,$lugares,$tipo]);
    }

}

