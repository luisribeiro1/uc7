<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Usuario
{

  # criar um atributo privado para receber a conexão com o banco de dados
  private $db;

  # método construtor da classe. Ele será executado, quando a classe for instanciada.
  public function __construct() {
    # executa o método estático para estabelecer a conexão com o banco de dados
    # método estático é aquele que não precisa ser instanciado
    $this->db = DataBase::getConexao();
  }

  public function getUsuarios() {

    # executa o códgo SQL no banco de dados através do método query
    # método query é usado para consultas, ou seja, quando usar SELECT
    $resultadoDaConsulta = $this -> db -> query("SELECT * FROM usuarios");
    # retorna um array associativo com o resultado da consulta
    return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById($idUsuario) {
    $sql = $this -> db -> prepare("SELECT * FROM usuarios WHERE idUsuario = ?");
    $sql -> execute([$idUsuario]);
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  public function delete ($id){
    $deletaRegistro = $this -> db -> prepare("DELETE FROM usuarios WHERE idUsuario = ?");
    return $deletaRegistro -> execute([$id]);
  }

    public function insert($nome, $usuario, $senha, $nivelAcesso) {
    # Criptografar a senha
    # Criptografia: é mão dupla / Hash: é mão única
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    $sql = $this -> db -> prepare('INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?)');
    return $sql -> execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
  }
}