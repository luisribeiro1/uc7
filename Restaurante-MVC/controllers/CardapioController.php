<?php

# inclui  o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
        $cardapioModel = new Cardapio();
        # cria um array que recebe a lista de mesa que o model retornará
        $lista_de_cardapio= $cardapioModel->getAllCardapio();

        # passar os dados do array para ser renderizado na view
        require "views/CardapioView.php";
    }
}