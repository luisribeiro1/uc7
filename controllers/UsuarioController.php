<?php

require "models/UsuarioModel.php";

class UsuarioController {
    
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new Usuario();
    }

    public function index(){
        $form_usuario = $this->usuarioModel->getAllUsuario();
        $baseUrl = $this->url;
        require "views/UsuarioView.php";
    }
    
    public function criar(){
        $baseUrl = $this->url;
        $acao = "criar";
        Require "views/UsuarioForm.php";
    }

    public function editar($idUsuario){
        $user = $this->usuarioModel->getById($idUsuario);
        
        $nome = $user["nome"];
        $usuario = $user["usuario"];
        $nivelAcesso = $user["nivelAcesso"];
        
        $baseUrl =$this->url;

        $acao = "editar";
        
        require "views/UsuarioForm.php";
    }

    

    public function atualizar(){
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivelAcesso"];


        $acao = $_POST["acao"];

        if($acao == "editar"){
            $idUsuario = $_POST["idUsuario"];
            $this->usuarioModel->update($idUsuario,$usuario,$nome,$nivelAcesso);
        }else{

            $this->usuarioModel->insert($usuario,$nome,$senha,$nivelAcesso);
        }



        header("location: " . $this->url . "/mesa-adm");
    }

    
}