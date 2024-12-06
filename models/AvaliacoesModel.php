<?php
require_once 'Database.php';

class Avaliacoes {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = $this->db->query('SELECT * FROM avaliacoes');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    # Método especial para retornar todas as avalições de um item do cardápio
    public function getByIdCardapio($idCardapio) {
       // $sql = $this->db->prepare("SELECT * FROM avaliacoes WHERE idCardapio = ? and situacao='ok'");
        $sql = $this->db->prepare("SELECT * FROM avaliacoes WHERE idCardapio = ? ");
        $sql->execute([$idCardapio]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idAvaliacao) {
        $sql = $this->db->prepare('SELECT * FROM avaliacoes WHERE idAvaliacao = ?');
        $sql->execute([$idAvaliacao]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nota, $comentario, $idCardapio,$data,$nome,$email) {
        $sql = $this->db->prepare(
            'INSERT INTO avaliacoes (nota, comentario, idCardapio, data, nome, email,situacao
            ) 
        VALUES (?, ?, ?, ?, ?, ?, ?)');
        return $sql->execute([$nota, $comentario, $idCardapio, $data, $nome, $email,'novo']);
    }

    public function aprovar($idAvaliacao) {
        $sql = $this->db->prepare('UPDATE avaliacoes SET situacao = ? WHERE idAvaliacao = ?');
        return $sql->execute(['ok',$idAvaliacao]);
    }

    public function delete($idAvaliacao) {
        $sql = $this->db->prepare('DELETE FROM avaliacoes WHERE idAvaliacao = ?');
        return $sql->execute([$idAvaliacao]);
    }
    
}
