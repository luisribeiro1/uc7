<?php

require_once "models/avaliacoesModel.php";

class avaliacoesController
{
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc7/restaurante-MVC";

    public function index(){
        

        # instancia a classe mesa para obter os dados do model
        $avaliacoesModel = new avaliacoes();

        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variaveis acima:
        # $Lista_de_mesas (array com os dados ) e $baseUrl
        require "views/avaliacoesView.php";
    }
}