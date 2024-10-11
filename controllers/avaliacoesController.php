<?php

require_once "models/avaliacoesModel.php";

class AvaliacoesController
{
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $avaliacoesModel;

    public function __construct(){
        $this->avaliacoesModel = new Avaliacoes();

    }
    public function index(){
        

        # instancia a classe mesa para obter os dados do model

        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_avaliacoes = $this->avaliacoesModel->getAllAvaliacoes();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variaveis acima:
        # $Lista_de_mesas (array com os dados ) e $baseUrl
        require "views/avaliacoesView.php";
    }
    public function excluir($id){
        $this->avaliacoesModel->delete($id);
        header("location: ".$this->url . "/avaliacoes-adm");
    }

    public function aprovar($idAvaliacao){
        $this->avaliacoesModel->update($idAvaliacao);
        header("location: ". $this->url . "/avaliacoes-adm");
    }
}