<?php
# Inclue o arquivo model
// require_once "models/ReservaModel.php";

class ReservaController
{
    # Criar a propriedade que recebera p endereço absoluto do site, este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    private $ReservaModel;

    public function __construct(){
        // $this->ReservaModel = new Login();
    }

    public function index(){
        $baseUrl = $this->baseUrl;
        // require "views/Reserva.php";
        echo "pagina de reservas de mesas";
    }

    
}