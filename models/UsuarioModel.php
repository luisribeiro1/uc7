<?php

require_once "DataBase.php";

class Usuario{

    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getAllUsers(){

        $resultadoDaConsulta = $this->db->query("SELECT * FROM  usuarios");
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getById($idUser){
        $resultadoDaConsulta = $this->db->prepare("SELECT * FROM usuarios WHERE idUsuario = ?");
        $resultadoDaConsulta->execute([$idUser]);

        return $resultadoDaConsulta->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
        return $sql->execute([$id];)
    }

    public function insert($nome,$usuario,$senha,$nivelAcesso){

        # criptografar senha
        // Criptografia: é mão dupla || Hash: é mão unica
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = $this->db->prepare( 
            "INSERT INTO usuarios (nome, usuario, senha, nivelAcesso)
            VALUES (?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$usuario,$senhaCriptografada,$nivelAcesso]);
    }

    public function update($nome,$usuario,$nivelAcesso){

        $sql = $this->db->prepare( 
            "INSERT INTO usuarios (nome, usuario, nivelAcesso)
            VALUES (?, ?, ?)"
        );
        return $sql->execute([$nome,$usuario,$nivelAcesso]);
    }

}