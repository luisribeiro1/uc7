<?php

require_once "models/CardapioModel.php";

class CardapioController 
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $url = "http://localhost/uc7/restaurante-mvc";
  
  public function index() {

    # instancia a classe Mesa para obter os dados do model
    $cardapioModel = new Cardapio();

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_cardapio = $cardapioModel -> getCardapio();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this->url;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_de_mesas (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/CardapioView.php";
  }
}