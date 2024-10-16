<?php

class SairController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    public function index(){

        #Remover ou Destroir todas as sessoes ativas
        session_destroy();
        
        #Redireciona para login
        header("location:".$this->url."/login");

    }
}