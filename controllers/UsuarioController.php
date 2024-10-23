<?php

require_once "models/UsuarioModel.php";

class UsuarioController{

    private $url = "http://localhost/uc7/restaurante-mvc";

    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new Usuario();
    }

    public function index(){
        $informacoes = $this->usuarioModel->getAllUsuario();

        $baseUrl = $this->url;

        require "views/UsuarioView.php";
    }

    

    public function editar($idUsuario){
        $usuario = $this->usuarioModel->getById($idUsuario);
        $idUsuario = $usuario["idUsuario"];
        $nome = $usuario["nome"];
        $nomeUsuario = $usuario["usuario"];

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar(){
        $idUsuario = $_POST["idUsuario"];
        $nome = $_POST["nome"];
        $nomeUsuario = $_POST["usuario"];

        $acao = $_POST["acao"];

        if($acao=="editar"){
            $idUsuario = $_POST["idUsuario"];
            $this->usuarioModel->update($idUsuario,$nome,$nomeUsuario);
        }else{
            $this->usuarioModel->insert($idUsuario,$nome,$nomeUsuario);
        }
        header("location: ".$this->url."/usuario");
    }
}