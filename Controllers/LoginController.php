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
        require "views/LoginForm.php"; // caregar o formulario de login
        //echo "Página de Login";
    }

    public function criar(){
        $nome = "pricila";
        $usuario = "pricila maria";
        $senha = "1234567";
        $this->loginModel->insert($nome, $usuario, $senha);
        echo "Usuario Criado com sucesso";
    }

    public function autenticar(){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $this->loginModel->getByUsuarioESenha($usuario,$senha);
        //caso Houver erro de autentificao, a sessao erro é criada e portanto ela existara aqui
        // Se ela existir aqui, indica que auntetificacao foi feita com sucesso
        if(isset($_SESSION["erro"])){

            

            unset($_SESSION["erro"]); //Remove a sessão
            $erro = "<div class='alert alert-danger'>Não foi possivel efetuar o login. Tente Novamente</div>";
            $baseUrl = $this->url;
            require "views/LoginForm.php";


        }else{
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
            header("location:".$this->url."/mesa-adm");
        }
    }
}