<?php

require "models/UsuarioModel.php";

class UsuarioController{

    private $url = "http://localhost/uc7/restaurante-mvc";
    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new UsuarioModel();

    }

    public function criar(){
        $baseUrl = $this->url;
        $acao = "criar";
        require "views/UsuarioForm.php";
    }

    public function editar($idUsuario){
        $geral = $this->usuarioModel->getByIdUsuario($idUsuario);
        
        $nomeUsuario = $geral['nome'];
        $perfilUsuario = $geral['usuario'];
        $nivelAcesso = $geral['nivelAcesso'];

        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar(){
    $nomeUsuario = $_POST['nome'];
    $perfilUsuario = $_POST['usuario'];
    $nivelAcesso = $_POST['nivelAcesso'];

        if($acao == "editar"){
            $this->usuarioModel->update($nomeUsuario, $perfilUsuario, $nivelAcesso);
        }elseif($acao == "criar"){
            $this->usuarioModel->criar($nomeUsuario, $perfilUsuario, $nivelAcesso);
        }
        header("location:" . $this->url . "/cardapio-adm");
    }

}
