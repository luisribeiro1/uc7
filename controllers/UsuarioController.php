<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

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
        $usuario = "";
        $senha = "";
        $nivelAcesso = "3";
        $acao = "criar";
        require "views/UsuarioForm.php";
    }
    
    public function editar($idUsuario){
        $usuario = $this->usuarioModel->getById($idUsuario);
        
        $nome = $usuario["nome"];
        $usuario = $usuario["usuario"];
        $nivelAcesso = $usuario["nivelAcesso"];
        $usuario = $usuario["usuario"];
        
        // foreach ($tipos as $t){
        //     $selecionado = $mesa["tipo"] == $t ? "selected" : "";
        //     $tipo.= "<option value='$t' $selecionado>$t</option>";
        // }

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/MesaForm.php";
    }
    

    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar(){

        $id = $_POST["idUsuario"];
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $nivelAcesso = $_POST["nivelAcesso"];

        $acao = $_POST["acao"];

       # Chama o método inserir que é responsável por gravar os dados na tabela
       if($acao=="editar"){
        $this->usuarioModel->update($idUsuario,$nome,$usuario,$nivelAcesso);
    }else{
        $this->usuarioModel->insert($idUsuario,$nome,$usuario,$nivelAcesso);
    }

        # Redirecionar o usuário para a rota principal de cardápio
        header("location: ".$this->url."/mesa");
    }

    public function excluir($id) {
        # Executa o método delete da classe de Model
        $this->usuarioModel->delete($idUsuario);

        # Redirecionar o usuário para a listagem de cardápios
        header("location: ".$this->url."/mesa");
    }
}