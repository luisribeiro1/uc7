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
        $erro = "";

        require "views/LoginForm.php";      //carregar o formulario de login

    }

    public function criar(){
        $nome = "Teste1";
        $usuario = "teste";
        $senha = "12345678";
        $nivelAcesso = 1;
        $this->loginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "usuario criado com sucesso";
    }

    public function autenticar(){

        // recupera os valores informados no formulário de login        
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;
        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        // Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # Se ela não existir aqui, indica que a autenticação foi feita com sucesso 
        if(isset($_SESSION["erro"])){
            
            unset($_SESSION["erro"]); // Remove a Sessão

            $erro ="<div class='alert alert-danger'> Não foi possível efeituar o login. Tente novamente </div>";
            
            $baseUrl = $this->url;

            require "views/LoginForm.php";
        }else{
            // echo "Usuário" . $_SESSION["nome_usuario"]. "logado com sucesso";
            header("location: " . $this->url . "/mesa-adm" );
        }
    }
}