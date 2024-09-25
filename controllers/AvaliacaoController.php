<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController{
    private $url = "http://localhost/uc7/restaurante-mvc";

    public function index(){

        $avaliacaoModel = new Avaliacoes;

        $lista_avaliacoes = $avaliacaoModel->getAllAvaliacao();
        $baseUrl = $this->$url;
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_avaliacoes(array com os dados) e $baseUrl com o endereço da aplicação
        require "views/AvaliacaoView.php";
    }   
}