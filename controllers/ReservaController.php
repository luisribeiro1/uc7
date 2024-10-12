<?php

// require_once "models/ReservaModel.php";

class ReservaController{

    private $url = "http://localhost/uc7/restaurante-MVC";
    private $reservaModel;

    public function __construct(){
        // $this->reservaModel = new Login();
    }
    
    public function index(){
        
        $baseUrl = $this->url;
        echo "pagina de reserva de mesas";
        // require "views/Reserva.php";
    }

}