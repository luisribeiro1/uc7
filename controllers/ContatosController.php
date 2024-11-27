<?php

class ContatoController{
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # Endereço da API
    private $endpoint = "https://limeiraweb.com.br/api/enderecos/";

    # Método de leitura da API
    public function index() {

        # cURL é uma biblioteca para requisições HTTP
        $curl = curl_init($this->endpoint);

        # Informar que ele deverá seguir redirecionamentos, caso houver
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        
        # configurar resposta como string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        # desativar a verificação SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisição e captura a resposta
        $resposta = curl_exec($curl);

        # Obter informações da requisição para tratamento de erros
        $informacoes = curl_getinfo($curl);
        
        // echo "<pre>";
        // var_dump($informacoes);
        // echo "<pre>";

        $codigo_http = $informacoes ["http_code"];

        # Faz o tratamento de erros de acordo com o código da resposta HTTP
        if($codigo_http < 200 || $codigo_http >= 300){
            $erro = "Não foi possível obter os dados. Código HTTP: ($codigo_http)";
        }else{         
        # converter a resposta em JSON em um array associativo do PHP
        $lista_de_contatos = json_decode($resposta, true);

        // var_dump($lista_de_contatos);
        }

        # Fechar a requisição
        curl_close($curl);

        $baseUrl = $this->baseUrl;
        require "views/ContatoView.php";
    }
}
