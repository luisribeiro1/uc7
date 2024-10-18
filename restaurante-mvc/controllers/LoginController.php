<?php
# inclui o arquivo model
require_once "models/LoginModel.php";

class LoginController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";
  private $LoginModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> LoginModel = new Login();
  }

  public function index() {
    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;
    $erro = "";
    require "views/LoginForm.php";
  }

  public function criar() {
    $nome = "Usuario";
    $usuario = "user";
    $senha = "user123";
    $nivelAcesso = "2";
    $this->LoginModel->insert($nome, $usuario, $senha, $nivelAcesso);
    echo "Usuário criado com sucesso";
  }

  public function autenticar() {

    # recupera os valores informados no formulário de login
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    # chama o model para verificar se os dados são válidos
    $this->LoginModel->getByUsuarioESenha($usuario, $senha);

    # Caso houver erro de autenticação, a sessão erro é criada e portanto ela existirá aqui
    # se ela não existir aqui, indica que a autenticação foi feita com sucesso
    if (isset($_SESSION["erro"])){

      //remove a sessão, pois ela não será necessária
      unset($_SESSION["erro"]);

      $erro = "<div class='alert alert-danger'><small>Não foi possível efetuar o login. Tente novamente</small></div>";
      
      $baseUrl = $this -> baseUrl;
      require "views/LoginForm.php";

    } else {
      // echo "Usuário " . $_SESSION['nome_usuario'] . " logado com sucesso.";
      header("location:" . $this->baseUrl . "/mesa-adm");
    }
  }
}