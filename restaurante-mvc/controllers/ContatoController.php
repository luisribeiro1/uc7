<?php

class ContatoController{

    private $endpoint = "https://limeiraweb.com.br/api/enderecos";
    private $url = "htpp://localhost/uc7/restaurante-mvc";
    

    public function index(){
        
        $curl = curl_init($this->endpoint);

        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resposta = curl_exec($curl);

        $lista_de_enderecos = json_decode($resposta, true);

        curl_close($curl);

        $baseUrl = $this->url;
        require "views/ContatoView.php";
    }    

}