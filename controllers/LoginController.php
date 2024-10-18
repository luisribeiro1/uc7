<?php

require_once "models/LoginModel.php";

class LoginController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    private $loginModel;

    public function __construct(){
        # Obter dados do model. Instancia a classe Mesa para obter os dados
        $this->loginModel = new Login();
    }
    public function index(){
        $baseUrl = $this->url;
        $erro = "";        
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_cardapio(array com os dados) e $baseUrl com o endereço da aplicação
    require "views/LoginForm.php"; // carregar o formulário de login
}

    public function criar(){
        $nome = "Teste";
        $usuario = "Teste";
        $senha = "123456";
        $nivelAcesso = 2;
        $this->loginModel->insert($nome, $usuario, $senha, $nivelAcesso);
        echo "Usuario criado com sucesso";
    }
    

    public function autenticar(){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        # chama o model para verificar se os dados são validos 
        $this->loginModel->getByUsuarioESenha($usuario, $senha);
        
        # caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # se ela não existir aqui, indica que a autenticação foi feita com sucesso
        if(isset($_SESSION["erro"])){
            //echo "Dados incorretos";
            unset($_SESSION["erro"]); # Remove a sessão

            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";

            $baseUrl = $this->url;        

            require "views/LoginForm.php";
        }else{
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso"; 
            header("location: " . $this->url . "/mesa-adm" );
        }
    }
}

