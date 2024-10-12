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
    
    
    echo "Página de logins";
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_cardapio(array com os dados) e $baseUrl com o endereço da aplicação
    // require "views/LoginView.php";
}

    public function criar(){
        $nome = "Adolf";
        $usuario = "Ditador45";
        $senha = "123456";
        $this->loginModel->insert($nome, $usuario, $senha);
        echo "Usuario criado com sucesso";
    }
    

    public function autenticar(){
        $usuario = "Ditador45";
        $senha = "123456";

        $this->loginModel->getByUsuarioESenha($usuario, $senha);
        
        if(isset($_SESSION["erro"])){
            echo "Dados incorretos";
            unset($_SESSION["erro"]); # Remove a sessão
        }else{
            echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso"; 
        }
    }
}

