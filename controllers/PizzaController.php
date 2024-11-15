<?php

class PizzaController{
    
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # Endereço da API
    private $endpoint = "https://limeiraweb.com.br/api/pizzas";

    # Método de leitura da API
    public function index(){

        # CURL é uma biblioteca para leitura de requisições HTTP
        $curl = curl_init($this->endpoint);

        # Informar que ele deverá seguir redirecionamentos, caso houver
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        
        # Configurar a resposta como string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Desativar a verificação SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisição e captura a resposta
        $resposta = curl_exec($curl);

        $lista_de_pizzas = json_decode($resposta, true);
    }
}