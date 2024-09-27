<?php

# Incluir um arquivo com a conexão com o banco de dados
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


    # Método construtor da classe. Ele sera executado, quando a classe for instanciada. 
    public function __construct(){
        
        # Executa o método esatático para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de mesas
    public function  getAllMesas(){
        // return $this->listaDeMesas;

        # Executa o código SQL no banco de dados através do método query
        # O método query é usado para consultas, ou seja, quando usar SELECT 
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");

        #retorna um array associativo com o resultado da consulta 
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    # Executar o SQL para remover o registro de uma mesa
    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
        return $sql->execute([$id]);
    }
}
