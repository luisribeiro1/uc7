<?php
<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Mesa
{
  
    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe. Ele será executado quando a classe for instanciada
    public function __construct(){

        # Executa o método estático para estabelecer a conexão com o banco de dados
        # Metodo estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de meses
    public function getAllUsuarios(){
        // return $this->listaDeMesas;
        
        # Executa o código SQL no Banco de Dados através do método query
        # O método é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM usuarios");

        # Retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE idUsuario = ?");
        $sql->execute([$id]);
        
        # Retorna um array associativo com o resultado da consulta
        return $sql->fetch(PDO::FETCH_ASSOC);
        }

 public function insert($nome, $usuario, $senha, $nivelAcesso){

    // Criptografar a senha
    // Criptografia: Mão dupla / Hash: mão única
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT); 
    $sql = $this->db->prepare(
        "INSERT INTO usuarios (nome,usuario,senha,nivelAcesso)
        VALUES(?, ?, ?, ?)"
    );
    return $sql->execute([$nome,$usuario, $senhaCriptografada, $nivelAcesso]);
}
    # Executar o SQL para remover o registro de uma mesa 
    public function delete($idUsuario){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
        return $sql->execute([$idUsuario]);
    }

    // Método para atualizar os dados da edição
    public function update($idUsuario,$nome,$usuario,$nivelAcesso){
        $sql = $this->db->prepare("UPDATE usuarios SET nome=?,usuario=?, nivelAcesso=? WHERE idUsuario=?");
        return $sql->execute([$nome,$usuario,$nivelAcesso,$idUsuario]);
    }

}