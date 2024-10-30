<?php
require_once "models/UsuarioModel.php";

class UsuarioController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";
  private $usuarioModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> usuarioModel = new Usuario;
  }

  public function index() {
    $lista_usuarios = $this -> usuarioModel -> getUsuarios();
    
    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;
    $erro = "";
    require "views/UsuarioView.php";
  }

  public function criar() {
    $baseUrl = $this -> baseUrl;
    $nome = "";
    $usuario = "";
    $senha = "";
    $nivelAcesso = "";
    $acao = "criar";
    require "views/UsuarioForm.php";
  }

  public function excluir($id){
    # executa o método da classe de Mdel
    $this -> usuarioModel -> delete($id);
    # redireciona o usuário para a listagem de mesas
    header("location: ".$this->baseUrl."/usuario-adm");
  }

  # método usado para chamar o formulário de alteração de senha - passo 1
  # usuario/alterarSenha
  public function alterarSenha($idUsuario) {
    $baseUrl = $this->baseUrl;
    require "views/AtualizarSenha.php";
  }

  # método utilizado para receber dados do formulário de alteração de senha - passo 2
  # /usuario/atualizarSenha
  public function atualizarSenha($idUsuario = null) {
    $senha = $_POST['senha'];
    $this->usuarioModel->updateSenha($idUsuario, $senha);
    header("Location: " . $this->baseUrl."/usuario-adm");
  }

  public function editar($idUsuario) {
    $baseUrl = $this -> baseUrl;
    $lista_usuarios = $this->usuarioModel->getById($idUsuario);
    $nome = $lista_usuarios["nome"];
    $usuario = $lista_usuarios["usuario"];
    $nivelAcesso = $lista_usuarios["nivelAcesso"];
    $senha = $lista_usuarios["senha"];
    $acao = "editar";

    require "views/UsuarioForm.php";
  }

  public function atualizar($idUsuario = null) {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $nivelAcesso = $_POST['nivelAcesso'];
    
    $acao = $_POST['acao'];

    if ($acao == "editar") {
      $this -> usuarioModel -> update($nome, $usuario, $nivelAcesso, $idUsuario);
    } else {
      $senha = $_POST['senha'];
      $this -> usuarioModel -> insert($nome, $usuario, $senha, $nivelAcesso);
    }

    header("Location: ". $this->baseUrl."/usuario-adm");
  }
}