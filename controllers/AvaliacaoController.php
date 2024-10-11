<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController{
    private $url = "http://localhost/uc7/restaurante-mvc";

    private $avaliacaoModel;

    public function __construct(){
        $this->avaliacaoModel = new Avaliacoes;
    }

    public function index(){    

        $lista_avaliacoes = $this->avaliacaoModel->getAllAvaliacao();
        $baseUrl = $this->url;
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_avaliacoes(array com os dados) e $baseUrl com o endereço da aplicação
        require "views/AvaliacaoView.php";
    }   

    public function excluir($id){
        $this->avaliacaoModel->delete($id);
        header("location:" . $this->url . "/avaliacoes-adm");
    }

    public function autorizar($idAvaliacao){  
        $this->avaliacaoModel->check($idAvaliacao);
        header("location:" . $this->url . "/avaliacoes-adm");
    }
}