<?php

# Inclue o arquivo model
require_once "models/LoginModel.php";

class LoginController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url= "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $loginModel;

    public function __construct(){
        # Instancia a classe Login para obter os dados do model
        $this->loginModel = new Login();
    }
    
    public function index()
    {
        $baseUrl = $this->url;
        $erro = "";
        require "views/LoginForm.php";   // Carregar o formulário de login
        // echo "Página de login";
    }

    public function criar(){

        // zebizerra - 271503
        $nome = "Leticia Rodrigues de Oliveira";
        $usuario = "LETS";
        $senha = "231124";
        $nivelAcesso = "";
        $this->loginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "Usuário criado com sucesso";
    }
    
    public function autenticar(){

        // Recupera os valores informados no formulário de login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivelAcesso"];

        # Chama o model para verificar se os dados são válidos
        $this->loginModel->getByUsuarioESenha($usuario,$senha);

        # Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # Se ela não existir aqui, indica que a autenticação foi feita com sucesso
        if (isset($_SESSION["erro"])){

            
            unset($_SESSION["erro"]); // Remove a sessão

            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
            $baseUrl = $this->url;
            // require "views/LoginForm.php";

        }else{
            $_SESSION["nome_usuario"] = $resultado["nome_usuario"];
            $_SESSION["nivel_acesso"] = $resultado["nivel_acesso"];
            
        }
    }
    
}