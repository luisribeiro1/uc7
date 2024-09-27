<?php

# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url= "http://localhost/uc7/restaurante-mvc";

    private $cardapioModel;

    public function __construct(){
        $this->cardapioModel = new Cardapio();
    }
    
    public function index()
    {
        # Instancia a classe Cardapio para obter os dados do model
        #$cardapioModel = new Cardapio();

        # Cria um objeto que receberá a lista de cardapio que o model retornará
        $lista_cardapio = $this->cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação
        require "views/CardapioView.php";
    }

    public function excluir($id) {
        $this->cardapioModel->delete($id);

        header("location:".$this->url."cardapio-adm");
    }

}