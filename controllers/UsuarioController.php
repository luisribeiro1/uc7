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

    public function excluir($idUsuario){
        $this->usuarioModel->delete($idUsuario);

        header("location: ".$this->url."/usuarios-adm");
    }

    public function criar(){
        $baseUrl = $this->url;
        $nome = "";
        $nomeUsuario = "";
        $senha = "";
        $nivelAcesso = "";

        $acao = "Criar";
        // header("location: ".$this->url."/usuarios-adm"); 
        require "views/UsuarioCadastroForm.php";
    }
    

    public function editar($idUsuario){
        $usuario = $this->usuarioModel->getById($idUsuario);
        $idUsuario = $usuario["idUsuario"];
        $nome = $usuario["nome"];
        $nomeUsuario = $usuario["usuario"];
        $senha = $usuario["senha"];
        $nivelAcesso = $usuario["nivelAcesso"];

        $baseUrl = $this->url;
        $acao = "Editar";
        require "views/UsuarioEditarForm.php";
    }

    public function atualizar($idUsuario = null){
        $nome = $_POST["nome"];
        $nomeUsuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivelAcesso"];

        $acao = $_POST["acao"];

        if($acao=="Editar"){
            $this->usuarioModel->update($idUsuario,$nome,$nomeUsuario,$nivelAcesso);
        }else{
            $this->usuarioModel->insert($nome,$nomeUsuario,$senha,$nivelAcesso);
        }
        header("location: ".$this->url."/usuarios-adm"); 
    }
}