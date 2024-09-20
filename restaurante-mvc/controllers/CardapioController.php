<?php

require_once "models/CardapioModel.php";


class CardapioController 
{

public function index()
{

$cardapioModel = new Cardapio();


$lista_do_cardapio = $cardapioModel->getAllCardapio();


require "views/CardapioView.php";

}




}
