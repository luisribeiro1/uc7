<?php

# inclui  o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
        $avaliacoesModel = new Avaliacoes();
        # cria um array que recebe a lista de mesa que o model retornará
        $lista_de_avaliacoes= $avaliacoesModel->getAllAvaliacoes();

        # passar os dados do array para ser renderizado na view
        require "views/AvaliacoesView.php";
    }
}