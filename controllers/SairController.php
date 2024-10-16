<?php

class SairController {
    private $url = "http://localhost/uc7/restaurante-MVC";

    public function index() {
        # Encerra todas as sessões ativas
        session_destroy();

        # Redireciona para o login
        header("location: " . $this->url . "/login");
    }
}