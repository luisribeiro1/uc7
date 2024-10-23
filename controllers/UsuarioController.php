<?php

require_once "models/UsuarioModel.php";

class UsuarioController
{

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    private $usuarioModel;

    public function __construct(){
        $this->UsuarioModel = new Usuario();
    }

    public function index(){
        
        $usuarioModel = new Usuario();

        $listaUsuarios = $usuarioModel->getAllUsers();

        $baseUrl = $this->baseUrl;
        
        require "views/UsuarioView.php";
    }

    public function criar(){
        // admin, axie 123456
        // user, user, 123456
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivelAcesso"];
        $this->LoginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "Usuário criado com sucesso";
    }

    public function excluir($id){

        $this->usuarioModel->delete($id);

        header("location: ".$this->baseUrl."/usuarios-adm")

    }

    public function editar($id){
        $user = $this->usuarioModel->getById($id);
        $nome = $user["nome"];
        $usuario = $user["usuario"];
        $nivelAcesso = $user["nivelAcesso"];

        $baseUrl = $this->baseUrl;

        $acao = "editar";
        require "views/UsuarioEdtiarForm.php";
    }

    

}