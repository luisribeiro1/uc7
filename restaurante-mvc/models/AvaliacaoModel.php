<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Avaliacao
{
  # criar um atributo privado para receber a conexão com o banco de dados
  private $db;

  # método construtor da classe. Ele será executado, quando a classe for instanciada.
  public function __construct()
  {
    # executa o método estático para estabelecer a conexão com o banco de dados
    # método estático é aquele que não precisa ser instanciado
    $this->db = DataBase::getConexao();
  }

  # criar um método para retornar a lista de mesas
  public function getAllAvaliacoes() {

    # executa o códgo SQL no banco de dados através do método query
    # método query é usado para consultas, ou seja, quando usar SELECT
    $resultadoDaConsulta = $this -> db -> query("SELECT * FROM avaliacao");
    # retorna um array associativo com o resultado da consulta
    return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
  }

  # métodod para retornar um ÚNICO item de mesas
  public function getById($idAvaliacao) {
    $sql = $this -> db -> prepare("SELECT * FROM avaliacao WHERE idAvaliacao = ?");
    $sql -> execute([$idAvaliacao]);
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  // # método para atualizar os dados da edição
  // public function update($idAvaliacao, $lugares, $tipo) {
  //   $sql = $this -> db -> prepare("UPDATE mesas SET lugares=?, tipo=? WHERE id=?");
  //   return $sql -> execute([$lugares, $tipo, $idAvaliacao]);
  // }

  # executa o SQL para remover um regsitro de uma mesa
  public function delete ($idAvaliacao){
    $deletaRegistro = $this -> db -> prepare("DELETE FROM avaliacao WHERE idAvaliacao = ?");
    return $deletaRegistro -> execute([$idAvaliacao]);
  }

    # cria o método para inserir os dados nos cards
    public function insert($idAvaliacao, $nota, $comentario, $data, $nome, $email, $situacao, $idCardapio) {
      $sql = $this -> db -> prepare("INSERT INTO mesas (idCardapio, nota, comentario, data, nome, email, situacao, idCardapio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      return $sql -> execute([$idAvaliacao, $nota, $comentario, $data, $nome, $email, $situacao, $idCardapio]);
    }  
}