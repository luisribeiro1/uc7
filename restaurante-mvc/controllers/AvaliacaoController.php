<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";

  # cria a proprieadade que será usada nos métodos a seguir
  private $avaliacaoModel;

  public function __construct()
  {
    # instancia a classe Avaliacao para obter os dados do model
    $this -> avaliacaoModel = new Avaliacao;
  }

  public function index() {

    # cria um array que recebe a lista das avaliações que o model retornará
    $lista_avaliacao = $this -> avaliacaoModel -> getAllAvaliacoes();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_avaliacao (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/AvaliacaoView.php";
  }

  public function excluir($id){
    # executa o método da classe de Model
    $this -> avaliacaoModel -> delete($id);
    
    # redireciona o usuário para a listagem das avaliações
    header("location: ".$this -> baseUrl."/avaliacoes-adm");
  }

  public function aprovar($idAvaliacao) {
    $this ->  avaliacaoModel -> approve($idAvaliacao);

    header("location: ". $this -> baseUrl."/avaliacoes-adm");

  }
}