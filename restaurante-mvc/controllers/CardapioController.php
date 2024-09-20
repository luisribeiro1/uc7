<?php

# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    public function index()
    {
        # Instancia a classe mesa para obter dados do model
        $cardapioModel = new Cardapio();

        # cria um array que recebera a lista de mesas que o model retornara
        $lista_do_cardapio = $cardapioModel->getAllMesas();

        # Passar os dados do array para ser renderizado na view
        require "views/Cardapioview.php";
    }
}