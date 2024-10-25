<?php


require_once "DataBase.php";

class Usuario

{

  
    private $db;

  
    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getAllUsuario(){
        $sql = $this->db->query("SELECT * FROM usuario");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idUsuario){
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
        $sql->execute([$idUsuario]);
        return $sql->fetch(PDO::FETCH_ASSOC);
     }

     public function delete($idUsuario) {
        $sql = $this->db->prepare("DELETE FROM usuario WHERE idUsuario = ?");
        return $sql->execute([$idUsuario]);
    }

    public function insert($nome, $usuario, $senha, $nivelAcesso){
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
       $sql = $this->db->prepare("INSERT INTO usuario (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?); ");
       return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
    }

    public function update($idUsuario,$nome,$usuario,$senha,$nivelAcesso){
        $sql = $this->db->prepare("UPDATE usuario SET nome=?,usuario=?,
       senha=?,nivelAcesso=? WHERE idUsuario=?"
        );
        return $sql->execute([$idUsuario,$nome,$usuario,$senha,$nivelAcesso]);
      }

}