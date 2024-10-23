<?php

require_once "DataBase.php";

class Usuario {

    private $db;
    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function getAllUsuario(){
        $sql = $this->db->query("SELECT * FROM usuarios");

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idUsuario){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE idUsuario = ?");
        $sql->execute([$idUsuario]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nome,$usuario,$senha,$nivelAcesso) {
        # Criptografar a senha
        # Criptografia: mão dupla / hash: mão única
        $senhaCriptografada = password_hash($senha,PASSWORD_BCRYPT);
        $sql = $this->db->prepare(
            "INSERT INTO usuarios (nome,usuario,senha,nivelAcesso) VALUES (?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$usuario,$senhaCriptografada,$nivelAcesso]);
    }

    public function update($idUsuario,$nome,$usuario,$senha) {
        $sql = $this->db->prepare("UPDATE usuarios SET nome=?,usuario=?,senha=? WHERE idUsuario=?");
        return $sql->execute([$nome,$usuario,$senha,$idUsuario]);
    }

    public function delete($idUsuario) {
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
        return $sql->execute([$idUsuario]);
    }
}
