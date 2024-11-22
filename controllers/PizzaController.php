<?php

class PizzaController{

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
    # endereço da API
    private $endpoint = "https://limeiraweb.com.br/api/pizzas";


    # método de leitura da API
    public function index(){

        # cURL é uma biblioteca para requisições HTTP
        $curl = curl_init($this->endpoint);

        # Informar que ele deverá seguir redirecionamentos, caso houver
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        
        # configurar a resposta como string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        # Desativar a verificação SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisição e captura a resposta
        $resposta = curl_exec($curl);

        # converter a resposta em JSON em um array associativo do PHP
        $lista_de_pizzas = json_decode($resposta, true);

        //var_dump($lista_de_pizzas);

        # Fechar a requisição
        curl_close($curl);

        $baseUrl = $this->baseUrl;
        require "views/PizzaView.php";

    }
}