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
    
    # Criar o método para retornar todos os itens do cardapio
    public function getAllCardapio(){
        // return $this->listaDeMesas;
       
        # Executa o código SQL no Banco de Dados através do método query
        # O método é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM cardapio");

         # Retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    # Criar o método para retornar um único item do cardapio
    public function getById($idCardapio){
       
        # O método é usado para consultas, ou seja, quando usar SELECT
        $sql = $this->db->prepare("SELECT * FROM cardapio WHERE idCardapio = ?");
        $sql->execute([$idCardapio]);

         # Retorna um array associativo com o resultado da consulta
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    // Criar método para inserir os dados na tabela
    public function insert($nome,$preco,$tipo,$descricao,$foto,$status){
        $sql = $this->db->prepare(
            "INSERT INTO cardapio (nome,preco,tipo,descricao,foto,status)
            VALUES(?,?,?,?,?,?)");
            return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status]);
    }

    # Executar o SQL para remover um item do cardápio

    public function delete ($idCardapio){
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ? ");
        return $sql->execute([$idCardapio]);
    }

    // Método para atualizar os dados da edição
    public function update($id,$nome,$preco,$tipo,$descricao,$foto,$status){
        $sql = $this->db->prepare("UPDATE cardapio SET nome=?,preco=?,tipo=?,descricao=?,foto=?,status=? WHERE idCardapio=?");
        return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status,$id]);
    }

}