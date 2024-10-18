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
        $erro= "";
        require "views/LoginForm.php";      // Carregar o formulário de login
        //echo "Página de Login";
    }

    public function criar(){
        $nome = "Guilherme Sampaio";
        $usuario = "sampaiovagaba";
        $senha = "123456";
        $nivelAcesso = '3';
        $this->loginModel->insert($nome, $usuario, $senha, $nivelAcesso);
         echo "Usuario Criado com sucesso";
    }

    public function autenticar(){

        # Recupera os valores informados no formulário de login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivelAcesso"];

        # Chama o Model para verificar se os dados são válidos
        $this->loginModel->getByUsuarioESenha($usuario,$senha, $nivelAcesso);

        # Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # Se ela não existir aqui, indica que a autenticação foi feita com sucesso
        if(isset($_SESSION["erro"])){
            
            unset($_SESSION["erro"]); //Remove a sessão
            
            $erro = "<div class='alert alert-danger'>Não possível efetuar o login. Tente novamente</div>";

            $baseUrl = $this->url;
            require "views/LoginForm.php"; 
        }else{
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
            $_SESSION["nome_usuario"] = $resultado["nome_usuario"];
            $_SESSION["nivel_acesso"] = $resultado['nivel_acesso'];
            header("location:". $this->url ."/mesa-adm");
            exit;
        }
    }
}