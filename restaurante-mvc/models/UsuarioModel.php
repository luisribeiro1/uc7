<?php

require_once 'Database.php';

class Usuario{
    private $db;

    public function __construct() {
        $this->db = Database::getConexao();
    }

    public function getAllUsuario(){
        $sql = $this->db->query("SELECT * FROM usuario");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

public function insert($nome, $usuario, $senha,$nivelAcesso) {

    # Criptografar a senha
    # Criptografia: mão dupla / Hash: mão única
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    $sql = $this->db->prepare(
        'INSERT INTO usuario (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?)');
    return $sql->execute([$nome, $usuario, $senhaCriptografada,$nivelAcesso]);
}

public function update($nome, $usuario, $senha, $nivelAcesso, $idUsuario){

   // echo "UPDATE usuario SET  nome='$nome', usuario='$usuario', senha='$senha', nivelAcesso='$nivelAcesso' WHERE idUsuario= $idUsuario";

    $sql = $this->db->prepare("UPDATE usuario SET  nome=?, usuario=?, senha=?, nivelAcesso=? WHERE idUsuario= ?");
    return $sql->execute([$nome, $usuario,$senha, $nivelAcesso, $idUsuario]);


}

public function getByid($idUsuario){
    $sql =$this->db->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
    $sql->execute([$idUsuario]);
    return $sql->fetch(PDO::FETCH_ASSOC);
}

}