<?php

require_once "DataBase.php";

class Cardapio
{
  private $db;

  # método construtor da classe
  public function __construct()
  {
    $this->db = DataBase::getConexao();
  }

  # criar um método para retornar a lista de mesas
  public function getCardapio() {
    // return $this->listaDeMesas;

    $sql = $this -> db -> query("SELECT * FROM cardapio");
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
}