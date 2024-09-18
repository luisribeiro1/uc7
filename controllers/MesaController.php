<?php 
# Inclue o arquivo model    
require_once "models/MesaModel.php";

class MesaController
{
    public function index(){

        # instancia a classe mesa para obter os dados do model
        $mesaModel = new Mesa();

        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_mesas = $mesaModel->getAllMesas();

        # Passar os dados do array para ser renderizado na view
        require "views/MesaView.php";
    }
}