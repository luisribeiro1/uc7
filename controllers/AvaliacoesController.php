<?php
# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    public function index()
    {
        # Instancia a classe Mesa para os dados do model 
        $avaliacoesModel = new avaliacoes();

        # Cria um array que receberá a lista de mesas que o model retornará 
        $lista_do_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        # Passar os dados do array para ser renderizado na view
        require "views/AvaliacoesView.php";
    }
}