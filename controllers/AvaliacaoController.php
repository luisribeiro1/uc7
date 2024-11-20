<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController{
    private $url = "http://localhost/uc7/restaurante-mvc";

    private $avaliacaoModel;

    public function __construct(){
        $this->avaliacaoModel = new Avaliacoes;
    }

    public function index(){    

        $lista_avaliacoes = $this->avaliacaoModel->getAllAvaliacao();
        $baseUrl = $this->url;
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_avaliacoes(array com os dados) e $baseUrl com o endereço da aplicação
        require "views/AvaliacaoView.php";
    }   

    public function listar($idCardapio){
        # Pegar os dados do cardapio
        require_once "models/CardapioModel.php"; # importar o model do cardápio
        $cardapioModel = new Cardapio();   # instanciar a classe CardapioModel
        $cardapioUnico = $cardapioModel->getById($idCardapio);
        
        #Pegar os dados da avaliacao do cardapio
        $listaDeAvaliacoes = $this->avaliacaoModel->getByIdCardapio($idCardapio);
        $baseUrl = $this->url;
        require "views/AvaliacaoSiteView.php";
        
    }

    public function excluir($id){
        $this->avaliacaoModel->delete($id);
        header("location:" . $this->url . "/avaliacoes-adm");
    }

    public function autorizar($idAvaliacao){  
        $this->avaliacaoModel->check($idAvaliacao);
        header("location:" . $this->url . "/avaliacoes-adm");
    }

    public function atualizar($idCardapio){
        # Recuperar os valores dos campos do formulário 
        $baseUrl = $this->url;
        $nota = $_POST['nota'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $comentario = $_POST['comentario'];

        $data = date("Y-m-d"); # pega a data atual do sistema no formato ano-mes-dia
        $situacao = "novo";
        $this->avaliacaoModel->insert($idCardapio, $nome, $email, $comentario, $data, $situacao, $nota);
        # redirecionar para a página de origem
         header("location: " .  $this->url . "/avaliacoes/listar/$idCardapio");

    }
}