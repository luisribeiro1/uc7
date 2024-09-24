<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    #este endereço será usado para compor as rotas
    private $baseUrl= "http://localhost/uc7/restaurante-mvc";
    
    public function index()
    {
        # Instancia a classe Avaliações para obter os dados do model
>>>>>>> Stashed changes
        $avaliacoesModel = new Avaliacoes();

        # Cria um objeto que receberá a lista de mesas que o Model retornará
        $lista_avaliacoes = $avaliacoesModel->getAllAvaliacoes();
        $baseUrl = $this->$baseUrl;

        # Passar os dados do array para ser renderizado na View
        require "views/AvaliacoesView.php";
    }
}