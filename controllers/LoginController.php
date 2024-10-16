<?php 

require_once "models/LoginModel.php";

class LoginController {

    private $url = "http://localhost/uc7/restaurante-mvc";

    private $loginModel;

    public function __construct(){
    
        $this->loginModel = new Login();
    }

    public function index(){
    
        $baseUrl = $this->url;
        $erro = "";
        require "views/LoginForm.php";                  // Carregar o formulário de login
        //echo "Página de Login";
    }

    public function criar(){
        $usuario = "Rodrigo ";
        $senha = "30398499";
        $this->loginModel->insert($nome, $usuario, $senha);
        echo "Usuario Criado com sucesso";
    }

    public function autenticar(){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];       

        $this->loginModel->getByUsuarioESenha($usuario,$senha);

        if(isset($_SESSION["erro"])){

            unset($_SESSION["erro"]); //Remove a sessão

        $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
        $baseUrl = $this->url;
        require 'views/LoginForm.php';

        }else{
                
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
            header("location:" . $this->url . "/mesa-adm");
        }
    }
}