<?php

require "models/UsuarioModel.php";

class UsuarioController{

    private $url = "http://localhost/uc7/restaurante-mvc";
    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new UsuarioModel();
    }

    public function index(){
        $baseUrl = $this->url;
        $lista_usuario = $this->usuarioModel->getAllUsuario();
        require "views/UsuarioView.php";
    }

    public function criar(){
        $baseUrl = $this->url;
        $acao = "criar";
        require "views/UsuarioForm.php";
    }

    public function editar($idUsuario){
        $geral = $this->usuarioModel->getByIdUsuario($idUsuario);
        
        $nome = $geral['nome'];
        $usuario = $geral['usuario'];
        $nivelAcesso = $geral['nivelAcesso'];

        $baseUrl = $this->url;

        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar(){
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $nivelAcesso = $_POST['nivelAcesso'];

    $acao = $_POST['acao'];

        if($acao == "editar"){
            $idUsuario = $_POST['idUsuario'];
            $this->usuarioModel->update($idUsuario ,$nome, $usuario, $nivelAcesso);
        }else{
            $this->usuarioModel->insert($nomeUsuario, $usuario, $senha, $nivelAcesso);
        }

        header("location:" . $this->url . "/usuario");
    }

}
