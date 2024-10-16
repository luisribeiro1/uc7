<?php

# Inclue o arquivo model
require_once "models/ReservaoModel.php";

class ReservaController
{
    
    private $reservaModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
  

    public function __construct(){

      //  $this->reservaModel = new Reserva();
    }

    public function index() {
    $baseUrl = $this->baseUrl;
  //require "views/Reserva.php";
  echo "Pagina de Reserva de mesas";
    }

  

}