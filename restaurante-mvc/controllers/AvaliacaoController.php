<?php

require_once "models/AvaliacaoModel.php";

class AvaliacaoController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";

  # cria a proprieadade que será usada nos métodos a seguir
  private $avaliacaoModel;

  public function __construct()
  {
    # instancia a classe Avaliacao para obter os dados do model
    $this -> avaliacaoModel = new Avaliacao;
  }

  public function index() {

    # cria um array que recebe a lista das avaliações que o model retornará
    $lista_de_avaliacoes = $this -> avaliacaoModel -> getAllAvaliacoes();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_avaliacoes (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/AvaliacaoView.php";
  }

  public function atualizar ($idCardapio) {
    
    # recuperar os valores dos campos do formulário
    $nota = $_POST['nota'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $comentario = $_POST['comentario'];
    $data = date("Y-m-d");    // pega a data do sistema no formato ano-mês-dia
    $situacao = "novo";

    $this->avaliacaoModel->insert($nota, $comentario, $idCardapio, $data, $nome, $email);
    # redireciono para a página de origem
    header("location: ".$this->baseUrl."/avaliacoes/listar/$idCardapio");
  }

  public function listar($idCardapio) {
    require_once "models/CardapioModel.php";  # importar o model do cardápio
    $cardapioModel = new Cardapio();          # instanciar a classe Cardapio

    $cardapioUnico = $cardapioModel->getById($idCardapio);
    $listaDeAvaliacoes = $this->avaliacaoModel->getByIdCardapio($idCardapio);
    $baseUrl = $this -> baseUrl;
    require "views/AvaliacaoSiteView.php";
  }

  public function excluir($id){
    # executa o método da classe de Model
    $this -> avaliacaoModel -> delete($id);
    
    # redireciona o usuário para a listagem das avaliações
    header("location: ".$this -> baseUrl."/avaliacoes-adm");
  }

  public function aprovar($idAvaliacao) {
    $baseUrl = $this->baseUrl;
    $this ->  avaliacaoModel -> aprovar($idAvaliacao);
    header("location: ". $this -> baseUrl."/avaliacoes-adm");
  }
}