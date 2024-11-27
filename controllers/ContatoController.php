<?php

class ContatoController {
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $endpoint = "https://limeiraweb.com.br/api/enderecos";

    public function index() {
        $curl = curl_init($this->endpoint);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resposta = curl_exec($curl);

        $lista_de_contatos = json_decode($resposta, true);

        $informacoes = curl_getinfo($curl);
        $codigo_http = $informacoes["http_code"];

        if($codigo_http < 200 || $codigo_http >= 300) {
            $erro = "Não foi possível obter os dados. Código HTTP: {$codigo_http}";
        }else{
            $lista_de_pizzas = json_decode($resposta, true);
        }

        curl_close($curl);
        $baseUrl = $this->url;
        require "views/ContatoView.php";
    }
}