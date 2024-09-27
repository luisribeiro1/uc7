<?php
# inclui o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";

  # cria a proprieadade que será usada nos métodos a seguir
  private $mesaModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> mesaModel = new Mesa;
  }

  public function index() {

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_de_mesas = $this -> mesaModel -> getAllMesas();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_de_mesas (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/MesaView.php";
  }

  public function excluir($id){
    # executa o método da classe de Mdel
    $this -> mesaModel -> delete($id);
    
    # redireciona o usuário para a listagem de mesas
    header("location: ".$this->baseUrl."/mesa-adm");
  }
}