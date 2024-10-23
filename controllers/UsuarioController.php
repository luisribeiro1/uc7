<?php

require_once "models/UsuarioModel.php";

class UsuarioController {
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $usuarioModel;

    public function __construct(){
        $this->loginModel = new Usuario();
    }

    public function index(){
        $baseUrl = $this->url;
        $erro = "";
        require "views/UsuarioView.php";
    }
}