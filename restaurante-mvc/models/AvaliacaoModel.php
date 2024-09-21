<?php

require_once "DataBase.php";

class Avaliacao
{
  #criar um atributo privado para receber a conexão com o banco de dados
  private $db;

  # método construtor da classe
  public function __construct()
  {
    $this->db = DataBase::getConexao();
  }

  # criar um método para retornar a lista de mesas
  public function getAllAvaliacoes() {
     // return $this->listaDeMesas;

     $sql = $this -> db -> query("SELECT * FROM avaliacao");
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
}