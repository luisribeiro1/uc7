<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController
{
  public function index() {

    # instancia a classe Mesa para obter os dados do model
    $avaliacaoModel = new Avaliacao();

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_avaliacao = $avaliacaoModel -> getAllAvaliacoes();

    # passa os dados do array para ser renderizado na view
    require "views/AvaliacaoView.php";
  }
}