<?php

require_once "models/CardapioModel.php";

class CardapioController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    
    private $cardapioModel;
    
    public function __construct(){
        # Obter dados do model. Instancia a classe Mesa para obter os dados
        $this->cardapioModel = new Cardapio();
    }
    public function index(){
    
    $lista_cardapio = $this->cardapioModel->getAllCardapio();
    
    $baseUrl = $this->url;
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_cardapio(array com os dados) e $baseUrl com o endereço da aplicação
    require "views/CardapioView.php";
}

public function excluir($id){
    $this->cardapioModel->delete($id);
    header("location:" . $this->url . "/cardapio-adm");
}
}