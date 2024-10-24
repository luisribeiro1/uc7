<?php

require "models/DataBase.php";

class UsuarioModel{

    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getAllUsuario(){
        $sql = $this->db->prepare("SELECT * FROM usuarios");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIdUsuario($idUsuario){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE idUsuario=?");
        $sql->execute([$idUsuario]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }


    public function insert($nome, $usuario, $senha, $nivelAcesso){
        # Criptografar a senha
        # Criptografia: mão dupla
        # Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
       $sql = $this->db->prepare("INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?); ");
       return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
    }

    public function update($idUsuario ,$nome, $usuario, $nivelAcesso){
        $sql = $this->db->prepare("UPDATE usuarios SET nome=?, usuario=?, nivelAcesso=? WHERE idUsuario=?");
        return $sql->execute([$nome, $usuario, $nivelAcesso, $idUsuario]);
    }
}