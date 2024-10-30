<?php

require_once "models/UsuarioModel.php";

class UsuarioController {
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new Usuario();
    }

    public function index(){
        $form_usuario = $this->usuarioModel->getAllUsuario();
        $baseUrl = $this->url;
        // $erro = "";
        require "views/UsuarioView.php";
    }

    public function criar() {
        $acao="criar";
        $idUsuario="";
        $nome="";
        $usuario= "";
        $nivelAcesso= "";
        
        $baseUrl = $this->url;
        require "views/UsuarioForm.php";
    }

    public function editar($idUsuario) {
        // $erro = "<div class='alert alert-danger'>Não foi possível concluir a ação. Tente novamente</div>";
        $form = $this->usuarioModel->getById($idUsuario);

        $nome = $form["nome"];
        $usuario = $form["usuario"];
        $nivelAcesso = $form["nivelAcesso"];

        $baseUrl = $this->url;

        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar() {
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $nivelAcesso = $_POST["nivelAcesso"];

        $acao = $_POST["acao"];

        if($acao == "editar") {
            $idUsuario = $_POST["idUsuario"];
            $this->usuarioModel->update($idUsuario,$nome,$usuario,$nivelAcesso);
        }else{
            $this->usuarioModel->insert($nome,$usuario,$senha,$nivelAcesso);
        }

        header("location: ".$this->url."/usuario");
    }

    # Método usado para chamar o formulário de alteração de senha - Passo 1
    # /usuario/alterarSenha
    public function alterarSenha($idUsuario) {
        $baseUrl = $this->url;
        require "views/AlterarSenhaForm.php";
    }

    # Método usado para receber os dados do formulário de alteração de senha - Passo 2
    # /usuario/atualizarSenha
    public function atualizarSenha($idUsuario = null) {
        $senha = $_POST["senha"];
        $this->usuarioModel->updateSenha($idUsuario,$senha);
        header("Location: ".$this->url."/usuario");
    }
}