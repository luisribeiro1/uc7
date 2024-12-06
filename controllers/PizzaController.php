<?php 

class PizzaController{
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # endereçp da API

    private $endpoint = "https://limeiraweb.com.br/api/pizzas";

    # Metodo de leitura da API
    public function index(){

        # CURL é uma biblioteca para leitura de requisições de HTTP
        $curl = curl_init($this->endpoint);

        # informa que ele deve seguir reridicionamentos, caso houver 
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        # Configura a resposta como string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Desativar a verificação SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisicao e captura a resposta
        $resposta = curl_exec($curl);

        # obter informacoes da repeticao para tratamento de erro
        $informacoes = curl_getinfo($curl);
        $codigo_http = $informacoes["http_code"];
        
        # Faz o tratamento de erro de acordo com o codigoda resposta
        if ($codigo_http < 200 || $codigo_http >=300){
            $erro = "Não foi possivel obter os dados. codigo_HTTP:($codigo_http)";

        }else{
            #converte a resposta em JSON em um array associativo do PHP
            $lista_de_pizzas = json_decode($resposta, true);
        }
        //echo "<pre>";
       // var_dump($informacoes);
        //echo "<pre>";



        # converte a resposta em JSON em um array associativo do php
        //$lista_de_pizzas = json_decode($resposta, true);

       // var_dump($lista_de_pizzas);

       //echo $resposta;

       # fechar a requisição
       curl_close($curl);

       $baseUrl = $this->baseUrl;
       require "views/PizzaView.php";

    }
}