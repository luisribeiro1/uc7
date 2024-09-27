<?php

require_once "models/CardapioModel.php";

class CardapioController
{
    
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $cardapioModel;

    public function __construct(){
        $this->cardapioModel = new Cardapio();
        
    }
    
    public function index(){
        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_cardapio = $this->cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;


        
        # Importa a view que irá renderizar o template usando as variaveis acima:
        # $Lista_de_mesas (array com os dados ) e $baseUrl
        require "views/CardapioView.php";
    }

    public function excluir($id){
        $this->cardapioModel->delete($id);

        header("location: ".$this->url. "/cardapio-adm");
    }
}