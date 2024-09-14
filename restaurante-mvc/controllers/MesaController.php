<?php

require_once "models/MesaModel.php";


class MesaController 
{

public function index()
{

$mesaModel = new Mesa();


$lista_de_mesas = $mesaModel->getAllMesas();


require "views/MesaView.php";

}




}

