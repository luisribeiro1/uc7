<?php 

require_once "models/LoginModel.php";

class LoginController {

    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    private $loginModel;

    public function __construct(){
       
        $this->loginModel = new Login();
    }

    public function index(){
      
        $baseUrl = $this->baseUrl;
        $erro = "";
        require "views/LoginForm.php"; // Carregar o formulário de login
    }

    public function criar(){
        $nome = "José Henrique";
        $usuario = "zezin";
        $senha = "123456";
        $nivelAcesso = 2;
        $this->loginModel->insert($nome, $usuario, $senha, $nivelAcesso);
        echo "Usuario Criado com sucesso";
    }

    public function autenticar(){

        // Recupera os valores informados no formulário de login.
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;

        // Chama o model para verificar se os dados são válidos
        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        // Caso houver erro de autentificação, a sessão erro é criada e portando ela existirá aqui
        // Se ela não existir aqui, indica que a autentificação foi feita com sucesso.
        if(isset($_SESSION["erro"])){
            
            unset($_SESSION["erro"]); //Remove a sessão, pois ela mão será mais necessária.
             
            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";

            $baseUrl = $this->baseUrl;
            require "views/LoginForm.php";
        }else{
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
            header("location: " .$this->baseUrl."/mesa-adm"); 
        }
    }
}