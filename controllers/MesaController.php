<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl= "http://localhost/uc7/restaurante-mvc";
    
    public function index()
    {

        # Instancia a classe Mesa para obter os dados do model
        $mesaModel = new Mesa();

        # Cria um objeto que receberá a lista de mesas que o Model retornará
        $lista_de_mesas = $mesaModel->getAllMesas();
        
        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->$baseUrl;

        # Importa a view que irá renderizar o template usando a variável e o array acima
        require "views/MesaView.php";
    }
}