<?php 
require_once "models/CardapioModel.php";

class CardapioController {
    public function index(){
        $cardapioModel = new Cardapio();

        $lista_de_cardapio = $cardapioModel->getAllCardapios();

        require "views/CardapioView.php";
    }
}