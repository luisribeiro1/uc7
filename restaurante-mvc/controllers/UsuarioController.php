<?php
require_once "models/LoginModel.php";

class UsuarioController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";
  private $UsuarioModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> UsuarioModel = new Usuario;
  }

  public function index() {
    $lista_usuarios = $this -> UsuarioModel -> getUsuarios();
    
    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;
    $erro = "";
    require "views/UsuarioView.php";
  }

  public function criar() {
    $nome = "Usuario";
    $usuario = "user";
    $senha = "user123";
    $nivelAcesso = "2";
    $this->UsuarioModel->insert($nome, $usuario, $senha, $nivelAcesso);
    echo "Usuário criado com sucesso";
  }

  public function excluir($id){
    # executa o método da classe de Mdel
    $this -> UsuarioModel -> delete($id);
    
    # redireciona o usuário para a listagem de mesas
    header("location: ".$this->baseUrl."/usuario-adm");
  }

}