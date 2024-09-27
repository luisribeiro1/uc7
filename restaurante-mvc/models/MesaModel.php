<?php

# Incluir o arquivo com a conexao co o banco de dados
require_once "DataBase.php";

class Mesa 
{

    # criar um array associativo com a relação das mesas 
    //  private $listaDeMesas = [ 
    //      ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //      ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //      ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //      ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //      ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //      ["id" => 8, "lugares" => 2, "tipo" => "redonda"],
    //  ];
    
    # Criar um atributo privado para receber a conexao com o banco 
    private $db;

    # metedo construtor da classe. Ele sera executado, quando a classe for instanciada 
    public function __construct(){


        
    # executa o metodo estatico para estabelecer a conexao com o banco de dados 
    # metodo estatico é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }

    # criar metodo para retornar a lista de mesas
    public function getAllMesas(){
        //return $this->listaDeMesas;

        # executa o codigo SQl no banc de dados atraves do metodo query
        # o metodo query é usado ara consultas, ou seja, quando usar SELECT  
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");

        # retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }



    # executar o SQL para remover o registro de uma mesa
    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
        return $sql->execute([$id]);
    }

}







