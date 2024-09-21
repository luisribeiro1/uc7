<?php

require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    public function index()
    {
        $avaliacoesModel = new Avaliacoes();

        $lista_de_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        require "views/AvaliacoesView.php";
    }
}