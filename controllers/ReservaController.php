<?php

// require_once "models/ReservaModel.php";

class ReservaController
{
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $reservaModel;

    public function __construct(){
        // $this->reservaModel = new Reserva();
    }
    
    public function index(){
        $baseUrl = $this->url;
        // require "views/Reserva.php";
        echo "Página de Reserva";
    }
}