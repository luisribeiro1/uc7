<?php

# Inclue o arquivo model
require_once "models/LoginModel.php";

class LoginController
{
    
    private $loginModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
  

    public function __construct(){

        $this->loginModel = new Login();
    }

    public function index() {
    $baseUrl = $this->baseUrl;
    $erro = "";
  require "views/LoginForm.php";
  echo "Pagina de login";
    }

    public function criar(){
      $nome = "neymar";
      $usuario = "ney";
      $senha = "123456";
      $nivelAcesso = 0;
      $this->loginModel->insert($nome, $usuario, $senha, $nivelAcesso);
      echo "Usuario criado com sucesso";
  }
  

  public function autenticar(){

    # Recupere os valores informados no formulario de login
      $usuario = $_POST["usuario"];
      $senha = $_POST["senha"];
      $manter_logado = isset( $_POST["manter_logado"]) ? true : false;

      
    # chama o model para vereficar se os dados sao validos
      $this->loginModel->getByUsuarioESenha($usuario, $senha, $manter_logado);
      

      # caso houver erro da autentificação, a sessão erro é criada e portanto ela exestira aqui
      # se ela existir aqui, indica que a autentificação foi feita com sucesso 
      if(isset($_SESSION["erro"])){
          echo "Dados incorretos";
          unset($_SESSION["erro"]); # Remove a sessão

          $erro = "<div class='alert alert-danger'>Não foi possivel efetuar o login. tente novante</div>";
          
          require "views/LoginForm.php";
         

      }else{
        //  echo "Usuário " . $_SESSION["nome_usuario"] . " logado com sucesso"; 
        header("location: " . $this->baseUrl."/mesa-adm");
      }
  }

}