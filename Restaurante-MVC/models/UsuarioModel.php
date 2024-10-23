<?php

require_once "DataBase.php";

class Usuario {
    private $db;

    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function insert($nome, $usuario, $senha, $nivelAcesso) {
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare('INSERT INTO usuarios (nome, usuario, senha, nivel_usuario) VALUES (?, ?, ?, ?)');
        return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
    }

    public function getAllUsuarios() {
        $sql = $this->db->query('SELECT * FROM usuarios');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $usuario, $senha, $nivelAcesso) {
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare('UPDATE usuarios SET nome = ?, usuario = ?, senha = ?, nivel_usuario = ? WHERE id = ?');
        return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso, $id]);
    }

    public function delete($id) {
        $sql = $this->db->prepare('DELETE FROM usuarios WHERE id = ?');
        return $sql->execute([$id]);
    }
}
