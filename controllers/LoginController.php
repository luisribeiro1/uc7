<?php

require_once "models/LoginModel.php";

class LoginController{

    private $url = "http://localhost/uc7/restaurante-MVC";
    private $loginModel;

    public function __construct(){
        $this->loginModel = new Login();
    }
    
    public function index(){
        
        $baseUrl = $this->url;
        echo "pagina de login";
        // require "views/Login.php";
    }

    public function criar(){
        $nome = "Erick Prado";
        $usuario = "Pradis";
        $senha = "123456";
        $this->loginModel->insert($nome,$usuario,$senha);
        echo "usuario criado com sucesso";
    }

    public function autenticar(){
        
        $usuario = "Pradis";
        $senha = "123456";

        $this->loginModel->getByUsuarioESenha($usuario,$senha);

        if(isset($_SESSION["erro"])){
            echo "Dados incorretos.";
            unset($_SESSION["erro"]); // Remove a Sessão
        }else{
            echo "Usuário" . $_SESSION["nome_usuario"]. "logado com sucesso";
        }
    }
}