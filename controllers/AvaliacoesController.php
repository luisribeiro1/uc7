<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController{
    public function index(){
        # Instancia a classe Avaliacoes para obter os dados do model
        $avaliacoesModel = new Avaliacoes();

        # Cria um objeto que receberá a lista de mesas que o Model retornará
        $lista_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        # Passar os dados do array para ser renderizado na View
        require "views/AvaliacoesView.php";
    }
}