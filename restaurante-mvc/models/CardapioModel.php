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

  # criar um método para retornar a lista de mesas
  public function getCardapio() {

    # executa o códgo SQL no banco de dados através do método query
    # método query é usado para consultas, ou seja, quando usar SELECT
    $resultadoDaConsulta = $this -> db -> query("SELECT * FROM cardapio");
    # retorna um array associativo com o resultado da consulta
    return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
  }
}