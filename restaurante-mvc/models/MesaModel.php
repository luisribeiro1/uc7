<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Mesa 
{
  # criamos um array associativo com a relação das mesas
  // private $listaDeMesas = [
  //   ['id' => 1, 'lugares' => 4, 'tipo' => 'quadrada'],
  //   ['id' => 2, 'lugares' => 6, 'tipo' => 'oval'],
  //   ['id' => 3, 'lugares' => 4, 'tipo' => 'quadrada'],
  //   ['id' => 4, 'lugares' => 8, 'tipo' => 'reatngular'],
  //   ['id' => 5, 'lugares' => 2, 'tipo' => 'redonda'],
  //   ['id' => 6, 'lugares' => 4, 'tipo' => 'quadrada'],
  //   ['id' => 7, 'lugares' => 6, 'tipo' => 'oval'],
  //   ['id' => 8, 'lugares' => 8, 'tipo' => 'retangular']
  // ];

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
  public function getAllMesas() {

    # executa o códgo SQL no banco de dados através do método query
    # método query é usado para consultas, ou seja, quando usar SELECT
    $resultadoDaConsulta = $this -> db -> query("SELECT * FROM mesas");
    # retorna um array associativo com o resultado da consulta
    return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
  }

  # método para retornar um ÚNICO item de mesas
  public function getById($id) {
    $sql = $this -> db -> prepare("SELECT * FROM mesas WHERE id = ?");
    $sql -> execute([$id]);
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  # método para atualizar os dados da edição
  public function update($id, $lugares, $tipo, $arrayCaracteristicas) {

    # desconstrui o array para uma sring, separando cada item por vírgula
    $caracteristicas = implode(",", $arrayCaracteristicas);

    try {
      $sql = $this -> db -> prepare("UPDATE mesas SET lugares=?, tipo=?, caracteristicas=? WHERE id=?");
      $sql -> execute([$lugares, $tipo, $caracteristicas, $id]);
      return [
        "sucesso" => true,
        "mensagem" => "Registro atualizado"
      ];
    }
    catch (PDOException $erro) {
      return [
        "sucesso" => false,
        "mensagem" => "Erro ao atualizar o registro: " . $erro->getMessage(),
        "codigo" => $erro->getCode()
      ];
    }
  }

  # executa o SQL para remover um regsitro de uma mesa
  public function delete ($id){
    try {
      $deletaRegistro = $this -> db -> prepare("DELETE FROM mesas WHERE id = ?");
      $deletaRegistro -> execute([$id]);
      return [
        "sucesso" => true,
        "mensagem" => "Registro deletado"
      ];
    }
    catch (PDOException $erro) {
      return [
        "sucesso" => false,
        "mensagem" => "Erro ao deletar o registro: " . $erro->getMessage(),
        "codigo" => $erro->getCode()
      ];
    }
  }

  # cria o método para inserir os dados nos cards
  public function insert($id, $lugares, $tipo, $arrayCaracteristicas) {

    # desconstrui o array para uma sring, separando cada item por vírgula
    $caracteristicas = implode(",", $arrayCaracteristicas);

    # executando o método sendo observado pelo try
    try {
      $sql = $this -> db -> prepare("INSERT INTO mesas (id, lugares, tipo, caracteristicas) VALUES (?, ?, ?, ?)");
      $sql -> execute([$id, $lugares, $tipo, $caracteristicas]);
      return [
        "sucesso" => true,
        "mensagem" => "Registro inserido"
      ];
    } 
    # tratando o método caso haja algum erro
    catch (PDOException $erro) {
      return [
        "sucesso" => false,
        "mensagem" => "Erro ao inserir o registro: " . $erro->getMessage(),
        "codigo" => $erro->getCode()
      ];
    }
  }
}