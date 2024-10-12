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
    // require "views/LoginView.php";
    echo "Página de login";
  }

  public function criar() {
    $nome = "Luis Henrique";
    $usuario = "luis";
    $senha = "123456";
    $this->LoginModel->insert($nome, $usuario, $senha);
    echo "Usuário criado com sucesso";
  }

  public function autenticar() {
    $usuario = "luis";
    $senha = "123456";
    $this->LoginModel->getByUsuarioESenha($usuario, $senha);

    if (isset($_SESSION["erro"])){
      echo "erro de autenticação";
      unset($_SESSION["erro"]); //remove a sessão
    } else {
      echo "Usuário " . $_SESSION['nome_usuario'] . " logado com sucesso.";
    }
  }

} 