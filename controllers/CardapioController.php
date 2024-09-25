<?php

require_once "models/CardapioModel.php";

class CardapioController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    
    public function index(){
    
        $cardapioModel = new Cardapio();
    
    $lista_cardapio = $cardapioModel->getAllCardapio();
    
    $baseUrl = $this->$url;
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_cardapio(array com os dados) e $baseUrl com o endereço da aplicação
    require "views/CardapioView.php";
}
}