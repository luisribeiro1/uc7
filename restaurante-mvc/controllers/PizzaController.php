<?php



class PizzaController{
    private $url = "htpp://localhost/uc7/restaurante-mvc";
    # Endereço da API
    private $endpoint = "https://limeiraweb.com.br/api/pizzas";

    # método de leitura da API 
    public function index(){
        # cURL é uma biblioteca para leitura de requisições HTTP
        $curl = curl_init($this->endpoint);

        # deverá seguir redirecionamentos caso houver
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        
        # configurar a resposta como string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        # desativar a verifiação SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        # Executa a requisição e captura a resposta 
        $resposta = curl_exec($curl);

        # converter a resposta em JSON em um array associativo do PHP
        $lista_de_pizzas = json_decode($resposta, true);
        
        # fechar a requisição
        curl_close($curl);

        $baseUrl= $this->url;
        require "views/PizzaView.php";

    }

}