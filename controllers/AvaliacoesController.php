<?php
# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    # Criar a propriedade que recebera p endereço absoluto do site, este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function index()
    {
        # Instancia a classe Mesa para os dados do model 
        $avaliacoesModel = new avaliacoes();

        # Cria um array que receberá a lista de mesas que o model retornará 
        $lista_do_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        # recebe o valor da propriedade $url a fica disponivel para uso na view
        $baseUrl = $this->baseUrl;

        # Importar a view que irá renderizar o template usando as variaveis acima:
        // $listas_do_avaliacoes (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/AvaliacoesView.php";
    }
}