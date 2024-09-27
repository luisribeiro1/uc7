<?php

# inclui  o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
     # criar a propriedade que recebe o endereço absoluto do site
    # este endereço será usado para compor as notas
    # url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/restaurante-mvc";

    # cria a propriedade que sera usada nos estados abaixo
    private $cardapioModel;
    
    
    public function __construct(){
        #instância  a classe  mesa para obter os dados do model
        $this->cardapioModel = new Cardapio();
    } 



    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
        $cardapioModel = new Cardapio();
        # cria um array que recebe a lista de mesa que o model retornará
        $lista_de_cardapio= $cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->url;

        # importa a view que irá rederizar o tamplate usando a variavel e o array acima:
        # lista_de_cardapio (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/CardapioView.php";
    }
    
    public function excluir($id){
        $this->cardapioModel->delete($id);
        # reridicinar o usuario para a listagem de mesas
        header("location: ".$this->url."/cardapio-adm");

    }    

}