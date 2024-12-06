<?php
require_once 'Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = $this->db->query('SELECT * FROM usuarios order by nome');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idUsuario) {
        $sql = $this->db->prepare('SELECT * FROM usuarios WHERE idUsuario = ?');
        $sql->execute([$idUsuario]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nome, $usuario, $senha,$nivelAcesso) {
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare('INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?)');
        return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
    }

    public function update($idUsuario, $nome, $usuario, $nivelAcesso) {
        $sql = $this->db->prepare('UPDATE usuarios SET nome = ?, usuario = ?, nivelAcesso = ? WHERE idUsuario = ?');
        $sql->execute([$nome, $usuario, $nivelAcesso, $idUsuario]);
        return $sql->rowCount();
    }

    public function updateSenha($idUsuario, $senha) {
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare('UPDATE usuarios SET senha = ? WHERE idUsuario = ?');
        $sql->execute([$senhaCriptografada, $idUsuario]);
        return $sql->rowCount();
    }

    public function delete($idUsuario) {
        $sql = $this->db->prepare('DELETE FROM usuarios WHERE idUsuario = ?');
        return $sql->execute([$idUsuario]);
    }
}