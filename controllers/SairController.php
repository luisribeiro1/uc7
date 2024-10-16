<?php

class SairController{
    
    private $url = "http://localhost/uc7/restaurante-mvc";
    public function index(){
        # remover ou destruir todas as sessões ativas
        session_destroy();

        # redireciona para o login
        header("location: " . $this->url . "/login" );
    }

}

