<?php

class SairController{

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
  
    public function index(){
        # Remover ou destruir todas as sessoes ativas
        session_destroy();

        
        # Redirecionar para o login
      header("location: ".$this->baseUrl."/login");
    
    }
}