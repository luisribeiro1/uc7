<?php

# Inclue o arquivo model
require_once "models/UsuarioModel.php";

class UsuarioController
{
    
    private $usuarioModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
  

    public function __construct(){

        $this->usuarioModel = new Usuario();
    }

    public function index() {
      $lista_de_usuario = $this->usuarioModel->getAllUsuario();
    $baseUrl = $this->baseUrl;
    $erro = "";
  require "views/UsuarioView.php";
    }

    public function criar(){
      $baseUrl = $this->baseUrl;
      $nome = "";
      $usuario = "";
      $senha = "";
      $nivelAcesso = "";
  
      $acao = "criar";
      require "views/UsuarioForm.php";
  }
  

  public function autenticar(){

    # Recupere os valores informados no formulario de login
      $usuario = $_POST["usuario"];
      $senha = $_POST["senha"];
      $manter_logado = isset( $_POST["manter_logado"]) ? true : false;

      $baseUrl = $this->baseUrl;

      
    # chama o model para vereficar se os dados sao validos
      $this->usuarioModel->getByUsuarioESenha($usuario, $senha, $manter_logado);
      

  }

  public function editar($idUsuario){
    $usuario = $this->usuarioModel->getById($idUsuario);
    $nome = $usuario["nome"];
    $senha = $usuario["senha"];
    $nivelAcesso = $usuario["nivelAcesso"];
    $usuarios = $usuario["usuario"];
    
 
   
    
  
  $baseUrl = $this->baseUrl;
  $acao = "editar";
  require "views/UsuarioForm.php";

}

public function atualizar($idUsuario = null){
    $idUsuario = $_POST["idUsuario"];
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $nivelAcesso = $_POST["nivelAcesso"];
   
    $baseUrl = $this->baseUrl;
    $acao = $_POST["acao"];
    

    // chama o metodo inserir que é responsavel por gravar os dados na tabela
    if($acao == "editar"){
        $idUsuario = $_POST["idUsuario"];
        $this->usuarioModel->update($nome,$usuario,$senha,$nivelAcesso,$idUsuario);
    }else{
        $this->usuarioModel->insert($nome,$usuario,$senha,$nivelAcesso);
    }
    // Redirecionar o usúario para a rota principal de cardapio
    header("location: " . $this->baseUrl."/usuario-adm");
}

}