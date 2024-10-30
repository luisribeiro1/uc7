<?php

# Inclue o arquivo model
require_once "models/UsuarioModel.php";

class UsuarioController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    
    private $url = "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $usuarioModel;

    public function __construct(){
        # Instancia a classe Mesa para obter os dados do model
        $this->usuarioModel = new Usuario();
    }
    
    public function index()
    {

        # Cria um objeto que receberá a lista de mesas que o Model retornará
        $lista_de_usuarios = $this->usuarioModel->getAllUsuarios();
        
        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação
        require "views/UsuarioView.php";
    }

    // Método responsável pela rota criar (mesa-adm/criar)
    public function criar(){
        $baseUrl = $this->url;
        $nome = "";
        $nome_usuario = "";
        $senha = "";
        $nivelAcesso = "<option></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>";
        $acao = "criar";
        require "views/UsuarioForm.php";
    }

    # Método utilizado para chamar o formulário de alteração de senha - passo 1
    # /usuario/aterarSenha

    public function alterarSenha($idUsuario){
        $url = $this->url;
        require 'views/AlterarSenhaForm.php';
    }

    # Método utilizado para receber os dados do formulário de alteração de senha - passo 2
    # /usuario/alterarSenha
    public function atualizarSenha($idUsuario = null){
        $senha = $_POST["senha"];
        $this ->usuarioModel->updateSenha($idUsuario, $senha);
        header("Location: " .$this->baseUrl."/usuario");
    } 
    
    public function editar($idUsuario){
        $usuario = $this->usuarioModel->getById($idUsuario);
        $idUsuario = $usuario["idUsuario"];
        $nome = $usuario["nome"];
        $nome_usuario = $usuario["usuario"];
        $nivelAcesso = $usuario["nivelAcesso"];

        $niveis = ["1","2","3"];
        $nivelAcesso = "<option></option>";
        foreach($niveis as $t){
            $selecionado = $usuario["nivelAcesso"] == $t ? "selected" : "";
            $nivelAcesso .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/UsuarioForm.php";
    }
    

    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar($idUsuario = null){

        $nome = $_POST["nome"];
        $nome_usuario = $_POST["usuario"];
        $nivelAcesso = $_POST["nivelAcesso"];
        $senha = $_POST["senha"];
        $acao = $_POST["acao"];

       # Chama o método inserir que é responsável por gravar os dados na tabela
       if($acao=="editar"){
        $this->usuarioModel->update($idUsuario,$nome,$nome_usuario,$nivelAcesso);
    }else{
        $nome = $_POST["nome"];
        $nome_usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $nivelAcesso = $_POST["nivelAcesso"];
        $this->usuarioModel->insert($idUsuario,$nome,$nome_usuario, $senha,$nivelAcesso);
    }

        # Redirecionar o usuário para a rota principal de cardápio
        header("location: ".$this->url."/usuario");
    }

    public function excluir($idUsuario) {
        # Executa o método delete da classe de Model
        $this->usuarioModel->delete($idUsuario);

        # Redirecionar o usuário para a listagem de cardápios
        header("location: ".$this->url."/usuario");
    }
}