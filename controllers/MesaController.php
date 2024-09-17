<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    public function index()
    {
        # Instancia a classe Mesa para obter os dados do model
        $mesaModel = new Mesa();

        # Cria um objeto que receberá a lista de mesas que o model retornará
        $lista_de_mesas = $mesaModel->getAllMesas();

        # Passar os dados do array para ser renderizado na view
        require "views/MesaView.php";
    }
}
