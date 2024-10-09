<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
   
    private $avaliacoesModel;

    public function __construct(){
        $this->avaliacoesModel = new Avaliacoes();
    }

    public function index()

    {
        # Instancia a classe mesa para obter dados do model
        $avaliacoesModel = new Avaliacoes();

        # cria um array que recebera a lista de mesas que o model retornara
        $lista_de_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        $baseUrl = $this->baseUrl;


        # Passar os dados do array para ser renderizado na view
        require "views/AvaliacoesView.php";
    }

    public function excluir($id){
        $this->avaliacoesModel->delete($id);
        header("location:".$this->url."/avaliacoes-adm");
    }
}