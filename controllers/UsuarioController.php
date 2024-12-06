<?php
require_once 'models/UsuarioModel.php';

class UsuarioController {

    private $usuarioModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $listaDeUsuarios = $this->usuarioModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/UsuarioView.php';
    }

    public function ver() {
        $listaDeUsuarios = $this->usuarioModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/UsuarioSiteView.php';
    }

    public function criar() {
        $acao = "criar";
        $idUsuario = "";
        $nome = "";
        $usuario = "";
        $nivelAcesso = "";
        $baseUrl = $this->baseUrl;
        require 'views/UsuarioForm.php';
    }

    # Método usado para chamar o formulário de alteração de senha - passo 1
    # /usuario/alterarSenha
    public function alterarSenha($idUsuario){
        $baseUrl = $this->baseUrl;
        require 'views/AlterarSenhaForm.php';
    }

    # Método usado para receber os dados do formulário de alteração de senha - passo 2
    # /usuario/atualizarSenha
    public function atualizarSenha($idUsuario = null) {
        $senha = $_POST['senha'];
        $this->usuarioModel->updateSenha($idUsuario, $senha);
        header("Location: ".$this->baseUrl."/usuario");
    }

    public function editar($idUsuario) {
        $listaDeUsuarios = $this->usuarioModel->getById($idUsuario);
        $nome = $listaDeUsuarios["nome"];
        $usuario = $listaDeUsuarios["usuario"];
        $nivelAcesso = $listaDeUsuarios["nivelAcesso"];
        $baseUrl = $this->baseUrl;
        $acao = "editar";
        require 'views/UsuarioForm.php';
    }

    public function atualizar($idUsuario) {
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $nivelAcesso = $_POST['nivelAcesso'];
        $acao = $_POST['acao'];

        if($acao=="editar"){
            $this->usuarioModel->update($idUsuario, $nome, $usuario, $nivelAcesso);
        }else{
            $senha = $_POST['senha'];
            $this->usuarioModel->insert($nome, $usuario, $senha, $nivelAcesso);
        }
        
        header("Location: ".$this->baseUrl."/usuario");
    }



    public function excluir($idUsuario) {
        $this->usuarioModel->delete($idUsuario);
        header("Location: ".$this->baseUrl."/usuario");
    }
}
