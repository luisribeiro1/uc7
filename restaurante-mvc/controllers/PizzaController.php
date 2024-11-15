<?php

class PizzaController 
{
  private $baseUrl = "http://localhost/uc7/restaurante-mvc";
  # endereço da API
  private $endpoint = "https://limeiraweb.com.br/api/pizzas/";
  
  # métodd de leitura da API
  public function index() {

    # cURL é uma biblioteca para requisições HTTP
    $curl = curl_init($this->endpoint);

    # informar que ele deverá seguir redirecionamento, caso houver
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    
    # configurar a resposta como string
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    # desativar a verificação SSL
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    # executa a requisição e captura a resposta
    $resposta = curl_exec($curl);

    # converte a resposta JSON em um array associtivo do PHP
    $lista_de_pizzas = json_decode($resposta, true);

    # fechar a requisição
    curl_close($curl);

    $baseUrl = $this->baseUrl;
    require "views/PizzaView.php";
    
  }
}