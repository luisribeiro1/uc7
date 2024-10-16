<?php

# Incluir o arquivo com a conexão com o banco o banco de dados
require_once "DataBase.php";

class Cardapio
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
    public function getAllCardapio(){
       // return $this->listaDeMesas;
        
       
        # Executa o codigo SQL no banco de dados atravéz do método query

        # O método query é usado para consultas, ou seja, quando usar SELECT 
        $resultadoDaConsulta = $this->db->query("SELECT * FROM Cardapio");

        # Retorna um array associativo com o resultado da consulta
       return  $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);

   }
    #metodo para retornar um Unico item do cardapio
    public function getByld($idCardapio){
       // return $this->listaDeMesas;
       $sql = $this->db->prepare("SELECT * FROM cardapio WHERE idCardapio = ?");
       $sql->execute([$idCardapio]);
       return $sql->fetch(PDO::FETCH_ASSOC);
        
       
        # Executa o codigo SQL no banco de dados atravéz do método query

        # O método query é usado para consultas, ou seja, quando usar SELECT 
      // $resultadoDaConsulta = $this->db->query("SELECT * FROM cardapio");

        # Retorna um array associativo com o resultado da consulta
      // return  $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);

   }

      // metodo para  inserir os dados na tabela
      public function insert($nome,$preco,$tipo,$descricao,$foto,$status){
         $sql = $this->db->prepare(
            "INSERT INTO cardapio (nome,preco,tipo,descricao,foto,status)
            VALUES (?,?,?,?,?,?)"
         );
         return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status]);
      }

     

      // metodo para atualizar os dados  da edicao
      public function update($id,$nome,$preco,$tipo,$descricao,$foto,$status){
         $sql = $this->db->prepare(" UPDATE cardapio SET nome=?,preco=?,tipo=?,descricao=?,foto=?,status=?
         WHERE idCardapio=?"
         );
         return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status,$id]);
         
      }
      

     # executar o SQL para remover o registro de uma mesa
     public function delete($id){
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idcardapio = ?");
        return $sql->execute([$id]);
    }    

}
