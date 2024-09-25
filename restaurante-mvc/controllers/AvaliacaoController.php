<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $url = "http://localhost/uc7/restaurante-mvc";

  public function index() {

    # instancia a classe Mesa para obter os dados do model
    $avaliacaoModel = new Avaliacao();

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_avaliacao = $avaliacaoModel -> getAllAvaliacoes();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this->url;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_de_mesas (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/AvaliacaoView.php";
  }
}