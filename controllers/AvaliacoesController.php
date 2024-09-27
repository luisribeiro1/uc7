<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
     # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url= "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $AvaliacoesModel;
    
    public function __construct() {
        # Instancia a classe Cardapio para obter os dados do model
        $this->avaliacoesModel = new Avaliacoes();
    }

    public function index()
    {
        # Cria um objeto que receberá a lista de avaliações que o model retornará
        $lista_avaliacoes = $this->avaliacoesModel->getAllAvaliacoes();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando a variável e o array acima
        # $lista_avaliacoes (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/AvaliacoesView.php";
    }

    public function excluir($idAvaliacao) {
        # Executa o método delete da classe de Model
        $this->AvaliacoesModel->delete($idAvaliacao);

        # Redirecionar o usuário para a listagem de cardápio
        header("location: ".$this->url."avaliacoes-adm");
    }
}