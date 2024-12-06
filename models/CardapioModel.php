<?php
require_once 'Database.php';

class Cardapio {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = $this->db->query('SELECT * FROM cardapio');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idCardapio) {
        $sql = $this->db->prepare('SELECT * FROM cardapio WHERE idCardapio = ?');
        $sql->execute([$idCardapio]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nome, $preco, $tipo,$descricao,$foto,$status) {
        $sql = $this->db->prepare('INSERT INTO cardapio (nome, preco, tipo, descricao, foto, status) VALUES (?, ?, ?, ?, ?, ?)');
        return $sql->execute([$nome, $preco, $tipo, $descricao, $foto, $status]);
    }

    public function update($idCardapio, $nome, $preco, $tipo, $descricao, $foto, $status) {
        $sql = $this->db->prepare('UPDATE cardapio SET nome = ?, preco = ?, tipo = ?, descricao = ?, foto = ?, status = ? WHERE idCardapio = ?');
        //$sql->execute([$nome, $preco, $tipo, $descricao, $foto, $status, $idCardapio]);
        if (!$sql->execute([$nome, $preco, $tipo, $descricao, $foto, $status, $idCardapio])) {
            // Exibe o erro
            print_r($sql->errorInfo());
            return false;
        }

        //$sql->debugDumpParams();
        return $sql->rowCount();

    }

    public function delete($idCardapio) {
        $sql = $this->db->prepare('DELETE FROM cardapio WHERE idCardapio = ?');
        return $sql->execute([$idCardapio]);
    }
}
