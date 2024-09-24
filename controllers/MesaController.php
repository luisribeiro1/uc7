<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    #este endereço será usado para compor as rotas
    private $baseUrl= "http://localhost/uc7/restaurante-mvc";
    
    public function index()
    {
>>>>>>> Stashed changes
        # Instancia a classe Mesa para obter os dados do model
        $mesaModel = new Mesa();

        # Cria um objeto que receberá a lista de mesas que o Model retornará
        $lista_de_mesas = $mesaModel->getAllMesas();
        $baseUrl = $this->$baseUrl;

        # Passar os dados do array para ser renderizado na View
        require "views/MesaView.php";
    }
}