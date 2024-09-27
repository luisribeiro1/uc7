<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Cardapio
{
    # Criar um array associativo com a relação das mesas
    //  private $listaDeMesas = [
    //      ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //      ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //      ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //      ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //      ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //      ["id" => 8, "lugares" => 10, "tipo" => "redonda"],
    //  ];

    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe. Ele será executado quando a classe for instanciada
    public function __construct(){

        # Executa o método estático para estabelecer a conexão com o banco de dados
        # Metodo estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista do cardapio
    public function getAllCardapio(){
        // return $this->listaDeMesas;
       
        # Executa o código SQL no Banco de Dados através do método query
        # O método é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM cardapio");

         # Retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    # Executar o SQL para remover o registro de uma mesa 

    public function delete ($idCardapio){
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ? ");
        return $sql->execute([$idCardapio]);
    }

}