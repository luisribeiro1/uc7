<?php

# inclui  o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    # criar a propriedade que recebe o endereço absoluto do site
    # este endereço será usado para compor as notas
    # url é uma propriedade pois está sendo criada no escopo da classe
    private $Url = "http://localhost/uc7/restaurante-mvc"; 

     # cria a propriedade que sera usada nos estados abaixo
     private $avaliacoesModel;
     
     
    public function __construct(){
        #instância  a classe  mesa para obter os dados do model
        $this->avaliacoesModel = new Avaliacoes();
    } 

    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
        $avaliacoesModel = new Avaliacoes();
        # cria um array que recebe a lista de mesa que o model retornará
        $lista_de_avaliacoes= $avaliacoesModel->getAllAvaliacoes();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->Url;

        # importa a view que irá rederizar o tamplate usando a variavel e o array acima:
        # lista_de_avaliações (array com os dados) e $baseUrl com o endereço da aplicação        
        require "views/AvaliacoesView.php";
    }
    
    public function excluir($idAvaliacao){
        $this->avaliacoesModel->delete($idAvaliacao);
        # reridicinar o usuario para a listagem de mesas
        header("location: ".$this->Url."/avaliacoes-adm");

    }

    public function aprovar($id){
        $this->avaliacoesModel->aprovar($id);
        # reridicinar o usuario para a listagem de mesas
        header("location: ".$this->Url."/avaliacoes-adm");

    }

}