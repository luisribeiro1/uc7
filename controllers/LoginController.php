<?php

require_once "models/LoginModel.php";

class LoginController
{
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $loginModel;

    public function __construct(){
        $this->loginModel = new Login();
    }
    
    public function index(){
        $baseUrl = $this->url;
        // require "views/Login.php";
        echo "Página de Login";
    }

    public function criar() {
        $nome = "Fernando";
        $usuario = "FERSnake_BR";
        $senha = "1234";
        $this->loginModel->insert($nome,$usuario,$senha);
        echo "Usuário criado com sucesso";
    }

    public function autenticar() {
        $usuario = "FERSnake_BR";
        $senha = "1234";

        $this->loginModel->getByUsuarioESenha($usuario,$senha);

        if (isset($_SESSION["erro"])) {
            echo "Dados incorretos.";
            unset($_SESSION["erro"]); # Remove a sessão 
        }else{
            echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
        }
    }
}