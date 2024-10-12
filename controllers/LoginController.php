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
        # Instancia a classe Cardapio para obter os dados do model
        $this->loginModel = new Login();
    }
    
    public function index()
    {
        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;
        //require "views/Login.php";
        echo "Página de Login";
    }

    public function criar() {
        $nome= "Glauber Ruiz";
        $usuario = "glauberruiz";
        $senha = "123456";
        $this->loginModel->insert($nome,$usuario,$senha);
        echo "Usuário criado com sucesso";
    }

    public function autenticar() {

        $usuario = "Glauber Ruiz";
        $senha = "xyz";

        $this->loginModel->getByUsuarioESenha($usuario, $senha);

        if (isset($_SESSION["erro"])){
            echo "Dados incorretos.";
            unset($_SESSION["erro"]);   // 
        }else{
            echo "Usuário" . $_SESSION["nome_usuario"] . " logado com sucesso";
        }
    }
    
}