<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController{
    public function index(){
        $avaliacaoModel = new Avaliacoes;

        $lista_avaliacoes = $avaliacaoModel->getAllAvaliacao();

        require "views/AvaliacaoView.php";
    }   
}