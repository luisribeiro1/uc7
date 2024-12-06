<?php

class PizzaController{

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # O endereço da API.
    private $endpoint = "https://limeiraweb.com.br/api/pizzas";

    # Método de leitura da API.
    public function index(){

        # Curl é uma biblioteca para requisições HTTP.
        $curl = curl_init($this->endpoint);

        # Informar que ele deverá seguir redirecionamentos, caso houver.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        # Configurar a reposta como string.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Desativar a verificação SSL.
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisição e captura a resposta.
        $resposta = curl_exec($curl);

        $informacoes = curl_getinfo($curl);
        $codigo_http = $informacoes["http_code"];

        if($codigo_http < 200 || $codigo_http >=300){
            $erro = "Não foi possível obter os dados. Código HTTP: {$codigo_http} ";
        }else{
            $lista_de_pizzas = json_decode($resposta, true);
        }

        # Converter a resposta em JSON em um array associativo.
        $lista_de_pizzas = json_decode($resposta, true);

        // var_dump($lista_de_pizzas);

        # Fechar a requisição
        curl_close($curl);

        $baseUrl = $this->baseUrl;
        require "views/PizzaView.php";
    }
}