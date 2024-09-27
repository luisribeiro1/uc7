<?php

require_once "models/CardapioModel.php";


class CardapioController 
{

    private $url = "http://localhost/uc7/restaurante-mvc";

    private $cardapioModel;

    public function __construct(){
        
    # instancia a classe Mesa para obter os dados do model
        $this->cardapioModel = new Cardapio();
    }
    

public function index()
{




$lista_do_cardapio = $this->cardapioModel->getAllCardapio();
$baseUrl = $this->url;

require "views/CardapioView.php";

}

public function excluir($id){
    $this->cardapioModel->delete($id);


    # redirecionar o usuario para a listagem de mesas 
    header("location: ".$this->url."/cardapio-adm");
}



}
