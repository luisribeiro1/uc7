<?php
# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    public function index()
    {
        # Instancia a classe Mesa para os dados do model 
        $cardapioModel = new cardapio();

        # Cria um array que receberá a lista de mesas que o model retornará 
        $lista_do_cardapio = $cardapioModel->getAllCardapio();

        # Passar os dados do array para ser renderizado na view
        require "views/CardapioView.php";
    }
}