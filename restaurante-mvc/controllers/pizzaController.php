<?php

class PizzaController{

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
    # endereço da API
    private $endpoint = "https://limeiraweb.com.br/api/pizzas";

    # método de leitura da API 
    public function index(){


        $curl = curl_init($this->endpoint);

        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Execute a requisição a captura a resposta
        $resposta = curl_exec($curl);

        $informacoes = curl_getinfo($curl);
        $codigo_http = $informacoes["http_code"];

        # faz o tratamento de erro de acordo com o codigo de resposta
        if ($codigo_http < 200 || $codigo_http >=300) {
            $erro = "Não foi possivel obter os dados. Codigo HTTP: {$codigo_http}";
        }else{
            # converter a resposta em JSON em um array associativa do PHP
            $lista_de_pizzas = json_decode($resposta, true);
        }


       // var_dump($informacoes);

        # converter a resposta em JSON em um array associativo do PHP
        $lista_de_pizzas = json_decode($resposta, true);

        # Fechar a requisição
        curl_close($curl);

        $baseUrl = $this->baseUrl;
        require "views/pizzaView.php";

       
    }
  
}