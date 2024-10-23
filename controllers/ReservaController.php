<?php

# Inclue o arquivo model
// require_once "models/ReservaModel.php";

class ReservaController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url= "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $reservaModel;

    public function __construct(){
        # Instancia a classe Cardapio para obter os dados do model
        // $this->reservaModel = new Cardapio();
    }
    
    public function index()
    {

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;
        
        # Importa a view que irá renderizar o template usando as variáveis acima:
        
        // require "views/Reserva.php";
        echo "Página de reserva";
    }
    
    
}