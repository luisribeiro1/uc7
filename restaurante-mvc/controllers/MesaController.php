<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    public function index()
    {
        # Instancia a classe mesa para obter dados do model
        $mesaModel = new Mesa();

        # cria um array que recebera a lista de mesas que o model retornara
        $lista_de_mesas = $mesaModel->getAllMesas();

        # Passar os dados do array para ser renderizado na view
        require "views/MesaView.php";
    }
}