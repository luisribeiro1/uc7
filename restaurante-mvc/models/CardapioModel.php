<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Cardapio
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

  # criar um método para retornar todos os itens do cardápio
  public function getCardapio() {

    # executa o códgo SQL no banco de dados através do método query
    # método query é usado para consultas, ou seja, quando usar SELECT
    $resultadoDaConsulta = $this -> db -> query("SELECT * FROM cardapio");
    # retorna um array associativo com o resultado da consulta
    return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
  }

  # métodod para retornar um ÚNICO item do cardápio
  public function getById($idCardapio) {
    $sql = $this -> db -> prepare("SELECT * FROM cardapio WHERE idCardapio = ?");
    $sql -> execute([$idCardapio]);
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  # método para atualizar os dados da edição
  public function update($id, $nome, $preco, $tipo, $descricao, $foto, $status) {
    $sql = $this -> db -> prepare("UPDATE cardapio SET nome=?, preco=?, tipo=?, descricao=?, foto=?, status=? WHERE idCardapio=?");
    return $sql -> execute([$nome, $preco, $tipo, $descricao, $foto, $status, $id]);
  }

  # executa o SQL para remover um regsitro de uma mesa
  public function delete ($id){
    $deletaRegistro = $this -> db -> prepare("DELETE FROM cardapio WHERE idCardapio = ?");
    return $deletaRegistro -> execute([$id]);
  }

  # criar método para inserir os dados na tabela
  public function insert ($nome, $preco, $tipo, $descricao, $foto, $status) {
    $sql = $this -> db -> prepare(
      "INSERT INTO cardapio (nome, preco, tipo, descricao, foto, status)
      VALUES (?, ?, ?, ?, ?, ?)"
      );
    return $sql -> execute([$nome, $preco, $tipo, $descricao, $foto, $status]);
  }
}