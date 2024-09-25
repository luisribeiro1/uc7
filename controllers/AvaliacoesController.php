<?php

# Inclue o arquivo model.
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    # Criar a propriedade que receberá um preço absouluto do site.
    # Este endereço será usado para compor as rotas.
    # $url é uma propriedade pois está sendo criada no escopo da classe.
    private $url = "http://localhost/UC7/restaurante-mvc";

    public function index()
    {
        # Instância a classe Avaliacao para obter os dados do model.
        $avaliacoesModel = new Avaliacoes();

        # Cria um objeto que receberá a lista de avaliações que o model retornará.
        $lista_de_avaliacoes = $avaliacoesModel->getAllAvaliacoes();

        # Recebe o valor da propriedade $url e fica disponível para uso na view.
        $baseUrl = $this->url;

        /*
            Importa a view que irá renderizar o template usando as variáveis acima:
            $lista_de_avaliacoes (array com dados) e $baseUrl com o endereço de aplicação
        */
        require "views/AvaliacoesView.php";
    }
}