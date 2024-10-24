<?php

require_once "DataBase.php";

class Usuario{

    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao(); 
    }

    public function getAllUsuario(){
        $resultado = $this->db->query("SELECT * FROM usuarios");

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idUsuario){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE idUsuario = ?");
        $sql->execute([$idUsuario]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($idUsuario){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
        return $sql->execute([$idUsuario]);
    }

public function insert($nome, $usuario, $senha, $nivelAcesso){  

    // Criptografar a senha
    // Criptografia: Mão dupla / Hash: mão única
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
    $sql = $this->db->prepare(
        "INSERT INTO usuarios (nome,usuario,senha,nivelAcesso)
        VALUES(?, ?, ?, ?)"
    );
    return $sql->execute([$nome,$usuario,$senhaCriptografada, $nivelAcesso]);
}

public function update($idUsuario, $nome, $nomeUsuario, $nivelAcesso){
    $sql = $this->db->prepare(
        "UPDATE usuarios SET nome=?,usuario=?, nivelAcesso=? WHERE idUsuario=?"
    );
    return $sql->execute([$nome, $nomeUsuario, $nivelAcesso, $idUsuario]);
}
}