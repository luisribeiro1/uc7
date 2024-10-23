<?php

require "models/UsuarioModel.php";

class UsuarioController {

    private $url = "http://localhost/uc7/restaurante-MVC";

    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new Usuario();
    }

    public function index(){

        $form_usuario= $this->usuarioModel->getAllUsuario();

        $baseUrl = $this->url;

        $erro ="";
        require "views/UsuarioView.php";
    }

    
}