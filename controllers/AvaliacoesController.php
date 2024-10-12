<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe

    private $url= "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $avaliacoesModel;

    public function __construct(){
        # Instancia a classe Avaliacoes para obter os dados do model
        $this->avaliacoesModel = new Avaliacoes();
    }
    
    public function index()
    {

        # Cria um objeto que receberá a lista de avaliacoes que o model retornará
        $lista_avaliacoes = $this->avaliacoesModel->getAllAvaliacoes();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação
        require "views/AvaliacoesView.php";
    }

    // Método responsável pela rota criar (cardapio-adm/criar)
    public function criar(){
        $acao = "criar";
        $idAvaliacao = "";
        $nota = "";
        $comentario = "";
        $data= "";
        $nome = "";
        $email = "";
        $situacao = "";
        $idCardapio = "";
        
        // Variavel usada para indicar ao formulário que os campos devem ficar vazios
        
        $baseUrl = $this->url;
        require "views/AvaliacoesForm.php";
    }

    public function aprovar($idCardapio){
        $avaliacao= $this->avaliacaoModel->getById($idAvaliacao);
        
        $nota = $avaliacao["nota"];
        $comentario = $avaliacao["comentario"];
        $data = $avaliacao["data"];
        $nome = $avaliacao["nome"];
        $email = $avaliacao["email"];
        $idCardapio = $avaliacao["idCardapio"];
        $foto = $avaliacao["foto"];
        
        $situacao = $avaliacao["situacao"] == true ? "checked" : "";

        // Variavel usada para indicar ao formulário que os campos devem ficar preenchidos
        $baseUrl = $this->url;
        $acao = "editar";
        require "views/AvaliacaoForm.php";
    }

     // Método responsável por receber os dados do formulário e enviar para o model
     public function atualizar(){
        $nota = $_POST["nota"];
        $comentario = $_POST["comentario"];
        $data = $_POST["data"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $situacao = $_POST["situacao"];
        $idCardapio = $_POST["idCardapio"];

        $acao = $_POST["acao"];
        
        # Chama o método inserir que é responsável por gravar os dados na tabela
        if($acao=="editar"){
            $idAvaliacao = $_POST["idAvaliacao"];
            $this->avaliacoesModel->update($nota,$comentario,$data,$nome,$email,$situacao,$idCardapio);
        }else{
            $this->avaliacoesModel->insert($nota,$comentario,$data,$nome,$email,$situacao,$idCardapio);
        }

        # Redirecionar o usuário para a rota principal de cardápio
        header("location: ".$this->url."/cardapio-adm");
    }

    public function excluir($idAvaliacoes) {
        # Executa o método delete da classe de Model
        $this->avaliacoesModel->delete($idAvaliacoes);

        # Redirecionar o usuário para a listagem de mesas
        header("location: ".$this->url."avaliacoes-adm");
    }
}