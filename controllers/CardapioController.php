<?php

# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl= "http://localhost/uc7/restaurante-mvc";
    
    public function index()
    {
        # Instancia a classe Mesa para obter os dados do model
        $cardapioModel = new Cardapio();

        # Cria um objeto que receberá a lista de mesas que o model retornará
        $lista_cardapio = $cardapioModel->getAllCardapio();
        $baseUrl = $this->$baseUrl;

        # Passar os dados do array para ser renderizado na view
        require "views/CardapioView.php";
    }
}