<?php 
# Incluir um arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Cardapio {
    # Criar um atributo privado para receber a conexão com o banco
    private $db; 

     # Método construtor da classe. Ele sera executado, quando a classe for instanciada. 
    public function __construct(){

        # Executa o método esatático para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }
    # Criar o método para retornar a lista de mesas
    // Método para retornar todos os itens do cardápio
    public function getAllCardapio(){

        # Executa o código SQL no banco de dados através do método query
        # O método query é usado para consultas, ou seja, quando usar SELECT 
        $sql = $this->db->query("SELECT * FROM cardapio");
        
        #retorna um array associativo com o resultado da consulta 
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para retornar um ÚNICO otem do cardápio
    public function getById($idCardapio){

        $sql = $this->db->prepare("SELECT * FROM cardapio WHERE idCardapio = ?");
        $sql->execute([$idCardapio]);
        
        return $sql->fetch(PDO::FETCH_ASSOC);
    }



    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ?");
        return $sql->execute([$id]);


    }

    // Método parar inserir os dados da tabela
    public function insert($nome,$preco,$tipo,$descricao,$foto,$status) {
        $sql = $this->db->prepare(
        "INSERT INTO cardapio (nome,preco,tipo,descricao,foto,status)
        VALUES (?, ?, ?, ?, ?, ? )");
        return $sql->execute(
            [$nome,$preco,$tipo,$descricao,$foto,$status]
        );
    }

    public function update($id,$nome,$preco,$tipo,$descricao,$foto,$status){
        $sql =$this->db->prepare(
            "UPDATE cardapio 
            SET nome=?,preco=?,tipo=?,descricao=?,foto=?,status=?
            WHERE idCardapio=?");

        return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status,$id]);
    }
}
