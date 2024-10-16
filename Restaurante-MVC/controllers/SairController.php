<?php 

class SairController {

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function index(){

        #remove ou destruir todas as sessoes ativas 
        session_destroy();
        
        #reridiciona para o login
        header ("location:" . $this->baseUrl . "/login"); 

    }

}