<?php

class SairController{
    
    private $url = "http://localhost/uc7/restaurante-mvc";
    public function index (){
        
        # Destruir todas as sessões ativas
        session_destroy();

        # Redireciona para o login
        header("location:" . $this->url . "/login");
    }
}