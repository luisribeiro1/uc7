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

  # executa o SQL para remover um regsitro de uma mesa
  public function delete ($id){
    $deletaRegistro = $this -> db -> prepare("DELETE FROM mesas WHERE id = ?");
    return $deletaRegistro -> execute([$id]);
  }

  # cria o método para inserir os dados nos cards
  public function insert($id, $lugares, $tipo) {
    $sql = $this -> db -> prepare("INSERT INTO mesas (id, lugares, tipo) VALUES (?, ?, ?)");
    return $sql -> execute([$id, $lugares, $tipo]);
  }
}