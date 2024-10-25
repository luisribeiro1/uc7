<?php

require_once "models/UsuarioModel.php";

class UsuarioController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new Usuario();
        
    }

    public function index(){
        $lista_de_usuario = $this->usuarioModel->getAllUsuario();
        $baseUrl = $this->url;
        
        require "views/UsuarioView.php";  
        }


    public function criar(){
        $nome = "";
        $usuario = "";
        $senha = "";
        $nivelAcesso = "";
        $baseUrl = $this->url;
          $acao = "criar";
          require "views/UsuarioForm.php";
       
    }



    public function editar($idUsuario){
        $user = $this->usuarioModel->getById($idUsuario);
        $nome = $user["nome"];
        $senha = $user["senha"];
        $nivelAcesso = $user["nivelAcesso"];
        $usuario = $user["usuario"];
       
       
        
        $baseUrl = $this->url;
        // Variável usada para indicar ao formulário que os campos devem ser preenchidos
        $acao = "editar";
        require "views/UsuarioForm.php";
    }

    public function atualizar($idUsuario = null){        
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
       
        $nivelAcesso = $_POST["nivelAcesso"];
        $idUsuario = $_POST["idUsuario"]; 
        $senha = null; 


        $acao = $_POST["acao"];
    

        if($acao == "editar"){
            $idUsuario = $_POST["idUsuario"];
        $this->usuarioModel->update($nome, $usuario,$senha, $nivelAcesso, $idUsuario);
        }else{
        $this->usuarioModel->insert($nome, $usuario,$senha, $nivelAcesso);
        }
    
        header("location:" . $this->url . "/usuario-adm");
    }






}

