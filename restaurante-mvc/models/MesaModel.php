<?php

class Mesa 
{
  # criamos um array associativo com a relação das mesas
  private $listaDeMesas = [
    ['id' => 1, 'lugares' => 4, 'tipo' => 'quadrada'],
    ['id' => 2, 'lugares' => 6, 'tipo' => 'oval'],
    ['id' => 3, 'lugares' => 4, 'tipo' => 'quadrada'],
    ['id' => 4, 'lugares' => 8, 'tipo' => 'reatngular'],
    ['id' => 5, 'lugares' => 2, 'tipo' => 'redonda'],
    ['id' => 6, 'lugares' => 4, 'tipo' => 'quadrada'],
    ['id' => 7, 'lugares' => 6, 'tipo' => 'oval'],
    ['id' => 8, 'lugares' => 8, 'tipo' => 'retangular']
  ];

  # criar um método para retornar a lista de mesas
  public function getAllMesas() {
    return $this->listaDeMesas;
  }

}