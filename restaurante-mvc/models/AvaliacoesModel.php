<?php
require_once "DataBase.php";

class Avaliacoes

{


    # Criar um atributo privado
    private $db;

    # Método construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }
   





    public function getAllAvaliacoes(){
       // return $this->listaDeMesas;

       $sql = $this->db->query("SELECT * FROM avaliacoes");
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getbyIdCardapio($idCardapio){
       $sql = $this->db->prepare("SELECT * FROM avaliacoes WHERE idCardapio = ? and situacao='ok'");
       $sql->execute([$idCardapio]);
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idAvaliacoes){
        $sql = $this->db->prepare("SELECT * FROM avaliacoes WHERE idAvaliacoes = ?");
        $sql->execute([$idAvaliacao]);
        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM avaliacoes WHERE idAvaliacoes = ?");
        return $sql->execute([$id]);
    }

    public function insert($nota, $comentario, $idCardapio, $data, $nome, $email){
        $sql = $this->db->prepare('INSERT INTO avaliacoes (nota, comentario, idCardapio, data, nome, email, situacao) VALUES (?,?,?,?,?,?,?)');
        return $sql->execute([$nota, $comentario, $idCardapio, $data, $nome, $email, 'novo']);
    }

    public function aprovar($id){
        $sql = $this->db->prepare('UPDATE avaliacoes SET situacao = ? WHERE idAvaliacoes = ?');
        return $sql->execute(['ok',$id]);
    }

}