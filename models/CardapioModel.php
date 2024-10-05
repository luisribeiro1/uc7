<?php
require_once "DataBase.php";

class cardapio{
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

    # Criar o método para retornar a lista de Cardapio
    public function getAllCardapio(){
        // return $this->listaDeCardapio;

        # Executa o código SQL no banco de dados atravez do método query. O método query é usado para consulta, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM cardapio");
        # Retorna um Array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    # Método para retornar um item especifico do cardapio
    public function getById($idCardapio){
        // return $this->listaDeMesas;

        # Executa o código SQL no banco de dados atravez do método query. O método query é usado para consulta, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->prepare("SELECT * FROM cardapio WHERE idCardapio = ?");
        $resultadoDaConsulta->execute([$idCardapio]);
        # Retorna um Array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetch(PDO::FETCH_ASSOC);
    }
    
    # executar o SQL para remover o registro de uma Cardapio
    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ?");
        return $sql->execute([$id]);
    }
    # Criar método para insetir os dados na tabele
    public function insert($nome,$preco,$tipo,$descricao,$status,$foto){
        $sql = $this->db->prepare( 
            "INSERT INTO cardapio (nome,preco,tipo,descricao,status,foto)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$preco,$tipo,$descricao,$status,$foto]);
    }

    # Método para atualizar os dados da edição
    public function update($idCardapio,$nome,$preco,$tipo,$descricao,$status,$foto){
        $sql = $this->db->prepare(
            "UPDATE cardapio SET nome=?,preco=?,tipo=?,descricao=?,status=?,foto=? 
            WHERE idCardapio=?");
        return $sql->execute([$nome,$preco,$tipo,$descricao,$status,$foto,$idCardapio]);
    }

}