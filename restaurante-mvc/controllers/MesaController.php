<?php
# inclui o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
  public function index() {

    # instancia a classe Mesa para obter os dados do model
    $mesaModel = new Mesa();

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_de_mesas = $mesaModel -> getAllMesas();

    # passa os dados do array para ser renderizado na view
    require "views/MesaView.php";
  }
}

