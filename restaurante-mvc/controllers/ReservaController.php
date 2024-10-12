<?php
# inclui o arquivo model
// require_once "models/ReservaModel.php";

class ReservaController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";
  private $ReservaModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    // $this -> ReservaModel = new Login();
  }

  public function index() {

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;
    // require "views/ReservaView.php";
    echo "Página de reserva";
  }
}