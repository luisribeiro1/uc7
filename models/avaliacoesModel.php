<?php 
# Incluir um arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Avaliacoes {
     # Criar um atributo privado para receber a conexão com o banco
    private $db; 

    # Método construtor da classe. Ele sera executado, quando a classe for instanciada. 
    public function __construct(){ 
        # Executa o método esatático para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }

    public function getAllAvaliacoes(){
        # Executa o código SQL no banco de dados através do método query
        # O método query é usado para consultas, ou seja, quando usar SELECT 
        $sql = $this->db->query("SELECT * FROM avaliacao");
        #retorna um array associativo com o resultado da consulta 
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIdCardapio($idCardapio){
        $sql = $this->db->prepare("SELECT * FROM avaliacao WHERE idCardapio=? and situacao='ok'");
        $sql->execute([$idCardapio]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idAvaliacao){
        $sql = $this->db->prepare("SELECT * FROM avaliacao WHERE idAvaliacao=?");
        $sql->execute([$idAvaliacao]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM avaliacao WHERE idAvaliacao = ?");            
        return $sql->execute([$id]);
    }

    public function insert($nota,$comentario,$idCardapio,$data,$nome,$email) {
        $sql = $this->db->prepare("INSERT INTO avaliacao (nota, comentario, idCardapio, data, nome, email, situacao) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $sql->execute([$nota,$comentario,$idCardapio,$data,$nome,$email,'novo']);
    }

    public function update($id) {
        $sql = $this->db->prepare("UPDATE avaliacao SET situacao = ? WHERE idAvaliacao = ?");
        return $sql->execute(['ok',$id]);
    }
}