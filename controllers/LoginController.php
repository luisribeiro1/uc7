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
        $nome = "Glauber Ruiz";
        $usuario = "glauberruiz";
        $senha = "123456";
        $this->loginModel->insert($nome, $usuario, $senha);
        echo "Usuario Criado com sucesso";
    }

    public function autenticar(){

        # Recupera os valores informados no formulário de login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        # Chama o Model para verificar se os dados são válidos
        $this->loginModel->getByUsuarioESenha($usuario,$senha);

        # Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
        # Se ela não existir aqui, indica que a autenticação foi feita com sucesso
        if(isset($_SESSION["erro"])){
            
            unset($_SESSION["erro"]); //Remove a sessão
            
            $erro = "<div class='alert alert-danger'>Não possível efetuar o login. Tente novamente</div>";

            $baseUrl = $this->url;
            require "views/LoginForm.php"; 
        }else{
            //echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso";
            header("location:". $this->url ."/mesa-adm");
        }
    }
}