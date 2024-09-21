<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    public function index()
    {
        # Instancia a classe Avaliações para obter os dados do model
        $avaliacoesModel = new Avaliacoes();

        # Cria um objeto que receberá a lista de avaliações que o model retornará
        $lista_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        # Passar os dados do array para ser renderizado na view
        require "views/AvaliacoesView.php";
    }
}