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
        $idUsuario = "";
        $nome = "";
        $nomeUsuario="";
        $senha = "";
        $nivelAcesso = "<option></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>";

        $acao = "criar";
        require "views/UsuarioCadastroForm.php";
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

    public function atualizar($idUsuario = null){
        $nome = $_POST["nome"];
        $nomeUsuario = $_POST["usuario"];
        $nivelAcesso = $_POST["nivelAcesso"];
        $senha = $_POST["senha"];

        $acao = $_POST["acao"];

        if($acao=="editar"){
            $this->usuarioModel->update($idUsuario,$nome,$nomeUsuario, $nivelAcesso);
        }else{
            $nome = $_POST["nome"];
            $nomeUsuario = $_POST["usuario"];
            $senha = $_POST["senha"];
            $nivelAcesso = $_POST["nivelAcesso"];
            $this->usuarioModel->insert($nome,$nomeUsuario,$senha,$nivelAcesso);
        }
        header("location: ".$this->url."/usuario");
    }
}