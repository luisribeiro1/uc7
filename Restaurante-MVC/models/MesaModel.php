<?php

# Incluir o arquivo com a conexão com o banco o banco de dados
require_once "DataBase.php";

class Mesa 
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
    # Metodo construtor da classe. Ele sera executado sempre que a classe for instânciada
    public function __construct(){

        # Executa o metodo estático para estabelecer a conexão com o banco de dados
        # Metodo estatico é aquele que não precisa ser instânciado
        $this->db = DataBase::getConexao();
    }

    #criar o metodo para retornar a lista de mesas
    public function getAllMesas(){
       // return $this->listaDeMesas;

       # Executa o codigo SQL no banco de dados atravéz do método query

       # O método query é usado para consultas, ou seja, quando usar SELECT 
       $resultadoDaConsulta  = $this->db->query("SELECT * FROM mesas");

       # Retorna um array associativo com o resultado da consulta
       return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

      // metodo para  inserir os dados na tabela
      public function insert($nome,$preco,$tipo,$descricao,$foto,$status){
         $sql = $this->db->prepare(
            "INSERT INTO mesas (nome,preco,tipo,descricao,foto,status)
            VALUES (?,?,?,?,?,?)"
         );
         return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status]);
    
    # executar o SQL para remover o registro de uma mesa
    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
        return $sql->execute([$id]);

    }
}

