<?php

class SairController{

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function index() {

        # Remover ou destruir todas as sessões ativas
        session_destroy();

        # Redireciona para o Login
        header("location:" .$this->baseUrl."/login");
    }

}