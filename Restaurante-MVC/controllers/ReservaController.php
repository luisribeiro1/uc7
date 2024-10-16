<?php

# inclui  o arquivo model
//require_once "models/ReservaModel.php";

class ReservaController
{
    # criar a propriedade que recebe o endereço absoluto do site
    # este endereço será usado para compor as notas
    # url é uma propriedade pois está sendo criada no escopo da classe
    private $reservaModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # cria a propriedade que sera usada nos estados abaixo
    
    
    public function __construct(){
        #instância  a classe  mesa para obter os dados do model
        //$this->REservaModel = new reserva();
    } 



    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
       // $cardapioModel = new Cardapio();
        # cria um array que recebe a lista de mesa que o model retornará
       // $lista_de_cardapio = $cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->baseUrl;    
       // require "views/CardapioView.php";
       echo "Pagina de reserva de mesas";
    }
   
}