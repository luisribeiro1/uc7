<?php
# Inclue o arquivo model
require_once "models/LoginModel.php";

class loginController
{
    # Criar a propriedade que recebera p endereço absoluto do site, este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    private $loginModel;

    public function __construct(){
        $this->LoginModel = new Login();
    }

    public function index(){
        $baseUrl = $this->baseUrl;
        // require "views/LoginForm.php";
        echo "pagina de login";
    }

    public function criar(){
        // admin, axie 123456
        $nome = "";
        $usuario = "Axie";
        $senha = "123456";
        $this->LoginModel->insert($nome,$usuario,$senha);
        echo "Usuário criado com sucesso";
    }

    public function autenticar(){
        $usuario = "Axie";
        $senha = "123456";

        $this->LoginModel->getByUsuarioESenha($usuario,$senha);

        if(isset($_SESSION["erro"])){
            echo "Usuario ou senha errado.";
            unset($_SESSION["erro"]); // Remove a sessão erro
        }else{
            echo "Usuário ".$_SESSION["nome_usuario"]." logado com sucesso";
        }
    }
    
}