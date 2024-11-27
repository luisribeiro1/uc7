<?php

class PizzaController {

    private $url = "http://localhost/uc7/restaurante-MVC";

    # Endereço da API.
    private $endpoint = "https://limeiraweb.com.br/api/pizzas";

    # Método de leitura da API.
    public function index() {
        # CURL é uma biblioteca para requisições HTTP.
        $curl = curl_init($this->endpoint);

        # Informar para o php que ele deverá seguir o redirecionamento, caso houver.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        # Configurar a resposta como string.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Desativar a verificação SSL.
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisição e captura a resposta.
        $resposta = curl_exec($curl);

        # Obter informações da requisição para tratamentos de erros.
        $informacoes = curl_getinfo($curl);
        $codigo_http = $informacoes["http_code"];

        if($codigo_http < 200 || $codigo_http >= 300) {
            $erro = "Não foi possível obter os dados. Código HTTP: {$codigo_http}";
        }else{
            # Coverter a resposta para json em um array associativo.
            $lista_de_pizzas = json_decode($resposta, true);
        }

        # Fechar a requisição
        curl_close($curl);
        $baseUrl = $this->url;
        require "views/PizzaView.php";
    }
}