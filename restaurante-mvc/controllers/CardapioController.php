<?php
# inclui o arquivo model
require_once "models/CardapioModel.php";

class CardapioController 
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";
  
  # cria a proprieadade que será usada nos métodos a seguir
  private $cardapioModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> cardapioModel = new Cardapio;
  }

  public function index() {

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_cardapio = $this -> cardapioModel -> getCardapio();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_de_mesas (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/CardapioView.php";
  }

  public function excluir($id){
    # executa o método da classe de Mdel
    $this -> cardapioModel -> delete($id);
    
    # redireciona o usuário para a listagem de mesas
    header("location: ".$this->baseUrl."/cardapio-adm");
  }
}