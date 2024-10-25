<?php

require_once "models/UsuarioModel.php";

class UsuarioController {
    private $usuarioModel;
    private $url = "http://localhost/uc7/restaurante-mvc";

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $lista_de_usuarios = $this->usuarioModel->getAllUsuario();
        $baseUrl = $this->url;
        require "views/UsuarioView.php";
    }

    public function criar() {
        $baseUrl = $this->url;
        $idUsuario = "";
        $nome = "";
        $senha ="";
        $acao = "criar";
        require "views/UsuarioForm.php";
    }

    public function editar($id) {
        $usuario = $this->usuarioModel->getById($id);
        $baseUrl = $this->url;
        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar() {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivel_usuario"];
        

        if ($_POST["acao"] == "editar") {
            $this->usuarioModel->update($id, $nome, $usuario, $senha, $nivelAcesso);
        } else {
            $this->usuarioModel->insert($nome, $usuario, $senha, $nivelAcesso);
        }

        header("location:" . $this->url . "/usuario-adm");
    }

    public function excluir($id) {
        $this->usuarioModel->delete($id);
        header("location:" . $this->url . "/usuario");
    }
}
