<?php

require_once "models/CardapioModel.php";

class CardapioController 
{
  public function index() {

    # instancia a classe Mesa para obter os dados do model
    $cardapioModel = new Cardapio();

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_cardapio = $cardapioModel -> getCardapio();

    # passa os dados do array para ser renderizado na view
    require "views/CardapioView.php";
  }
}