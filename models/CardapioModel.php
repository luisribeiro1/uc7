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
    public function getAllCardapio(){

        # Executa o código SQL no banco de dados através do método query
        # O método query é usado para consultas, ou seja, quando usar SELECT 
        $sql = $this->db->query("SELECT * FROM cardapio");
        
        #retorna um array associativo com o resultado da consulta 
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ?");
        return $sql->execute([$id]);
    }

    # Método para inserir os dados na tabela
    public function insert($nome,$preco,$tipo,$descricao,$foto,$status) {
        $sql = $this->db->prepare(
            "INSERT INTO cardapio (nome,preco,tipo,descricao,foto,status)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status]);
    }
}