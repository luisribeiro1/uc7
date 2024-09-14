<?php
# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    public function index()
    {
        # Instancia a classe Mesa para os dados do model 
        $mesaModel = new Mesa();

        # Cria um array que receberá a lista de mesas que o model retornará 
        $lista_de_mesas = $mesaModel->getAllmesas();

        # Passar os dados do array para ser renderizado na view
        require "views/MesaView.php";
    }
}