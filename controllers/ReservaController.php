<?php

// require_once "models/LoginModel.php";

class ReservaController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    private $reservaModel;

    public function __construct(){
        # Obter dados do model. Instancia a classe Mesa para obter os dados
        // $this->loginModel = new Cardapio();
    }
    public function index(){
    
    // $login = $this->loginModel->getAllCardapio();
    
    echo "Página de reserva";
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_cardapio(array com os dados) e $baseUrl com o endereço da aplicação
    // require "views/LoginView.php";
}

  
}

