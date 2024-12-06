<?php
require_once 'models/LoginModel.php';

class LoginController {

    private $loginModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function __construct() {
        $this->loginModel = new Login();
    }

    public function index() {
        $baseUrl = $this->baseUrl;
        $erro = "";
        require 'views/LoginForm.php';      // Carregar o formulário de login
        //echo "Página de login";
    }

    public function criar(){

        // luis - 123456
        $nome = "Gustavo Ribeiro";
        $usuario = "gustavo";
        $senha = "654321";
        $this->loginModel->insert($nome,$usuario,$senha);
        echo "Usuário criado com sucesso";
    }

    public function autenticar() {

        // Recupera os valores informados no formulário de login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;

        # chama o model para verificar se os dados são válidos
        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        # Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # Se ela não existir aqui, indica que a autenticação foi feita com sucesso
        if (isset($_SESSION["erro"])){
            
            unset($_SESSION["erro"]);   // Remove a sessão, pois ela não será mais necessária 

            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
            
            $baseUrl = $this->baseUrl;
            require 'views/LoginForm.php';            
            
        }else{
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
            header("location:" . $this->baseUrl . "/mesa-adm");
        }
    }

}
