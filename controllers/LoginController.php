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
        $erro = "";
        require "views/LoginForm.php";   # Carregar o formulário de login.
    }

    public function criar() {
        $nome = "Fernando";
        $usuario = "FERSnake_BR";
        $senha = "1234";
        $this->loginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "Usuário criado com sucesso";
    }

    public function autenticar() {
        # Recupera os valores informados no login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;

        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        # Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # Se ela não existir aqui, indica que a autenticação foi feita com sucesso
        if (isset($_SESSION["erro"])) {
            unset($_SESSION["erro"]); # Remove a sessão, pois ela não será mais necessária
            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
            $baseUrl = $this->url;
            require "views/LoginForm.php";
        }else{
            header("location: " . $this->url . "/mesa-adm");
        }
    }
}