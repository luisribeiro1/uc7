<?php 
require "DataBase.php";

class Usuario {

    private $db; 

    public function __construct(){
        $this->db = DataBase::getConexao();
    }
    public function getAllUsuario(){
        $result = $this->db->query("SELECT * FROM usuarios");

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert($nome, $usuario, $senha, $nivelAcesso) {
        
        //Criptografar a senha
        // Criptografia: mão dupla / Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        
        
        $sql = $this->db->prepare("INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ? , ?)");
        
        return $sql->execute([$nome,$usuario,$senhaCriptografada,$nivelAcesso]);
    }
}