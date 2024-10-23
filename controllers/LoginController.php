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
        $erro = "";
        require "views/LoginForm.php"; // Carregar dormulário de Login
    }

    public function criar(){
        // admin, axie 123456
        // user, user, 123456
        $nome = "";
        $usuario = "mod";
        $senha = "123456";
        $nivelAcesso = 2;
        $this->LoginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "Usuário criado com sucesso";
    }

    public function autenticar(){
        // Recupera os valores do formulário de login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;
        
        // Chama o modelo para verificar se os dados são validos
        $this->LoginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        // Caso houver erro de autentificação, a sessão erro é criada e portanto ela existirá aqui
        // Se ela não exisitir aqui, indica que a autentificação foi feita com sucesso.
        if(isset($_SESSION["erro"])){
            // echo "Usuario ou senha errado.";
            unset($_SESSION["erro"]); // Remove a sessão erro
            
            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
            $baseUrl = $this->baseUrl;
            require "views/LoginForm.php";

        }else{
            // echo "Usuário ".$_SESSION["nome_usuario"]." logado com sucesso";
            header("location:" .$this->baseUrl."/mesa-adm");

        }
    }
    
}