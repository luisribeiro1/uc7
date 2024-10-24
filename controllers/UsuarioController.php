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

        header("location: ".$this->url."/usuario");
    }

    public function criar(){
        $baseUrl = $this->url;
        $nivel = "<option></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>";
        $acao = "criar";
        require "views/UsuarioForm.php";
    }
    

    public function editar($idUsuario){
        $usuario = $this->usuarioModel->getById($idUsuario);
        $idUsuario = $usuario["idUsuario"];
        $nome = $usuario["nome"];
        $nomeUsuario = $usuario["usuario"];
        $senha = $usuario["senha"];
        $nivelAcesso = $usuario["nivelAcesso"];

        $niveis = ["1","2","3"];
        $nivelAcesso = "<option></option>";
        foreach($niveis as $t){
            $selecionado = $usuario["nivelAcesso"] == $t ? "selected" : "";
            $nivelAcesso .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar(){
        $idUsuario = $_POST["idUsuario"];
        $nome = $_POST["nome"];
        $nomeUsuario = $_POST["usuario"];
        $nivelAcesso = $_POST["nivelAcesso"];

        $acao = $_POST["acao"];

        if($acao=="editar"){
            $idUsuario = $_POST["idUsuario"];
            $this->usuarioModel->update($idUsuario,$nome,$nomeUsuario, $nivelAcessoo);
        }else{
            $this->usuarioModel->insert($idUsuario,$nome,$nomeUsuario,$nivelAcesso);
        }
        header("location: ".$this->url."/usuario");
    }
}