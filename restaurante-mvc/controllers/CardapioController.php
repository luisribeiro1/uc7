<?php
# inclui o arquivo model
require_once "models/CardapioModel.php";

class CardapioController 
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";
  
  # cria a proprieadade que será usada nos métodos a seguir
  private $cardapioModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> cardapioModel = new Cardapio;
  }

  public function index() {

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_cardapio = $this -> cardapioModel -> getCardapio();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_de_mesas (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/CardapioView.php";
  }

  public function excluir($id){
    # executa o método da classe de Mdel
    $this -> cardapioModel -> delete($id);
    
    # redireciona o usuário para a listagem de mesas
    header("location: ". $this -> baseUrl."/cardapio-adm");
  }

  # método responsável pela rota criar (cardapio-adm/criar)
  public function criar() {
    $baseUrl = $this -> baseUrl;
    $tipo = "<option></option>
      <option>Prato quente</option>
      <option>Prato frio</option>
      <option>Sobremesa</option>
      <option>Bebida</option>
      <option>Outros</option>
    ";

    # variável usada para indicar ao formulário que os campos devem ficar vazios
    $acao = "criar";
    require "views/CardapioForm.php";
  }

  public function editar($idCardapio) {
    $cardapio = $this -> cardapioModel -> getById($idCardapio);
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];

    $status = $cardapio["status"] == true ? "checked" : "";

    $tipos = ["Prato quente", "Prato frio", "Sobremesa", "Bebida", "Outros"];
    $tipo = "<option></option>";
    foreach ($tipos as $t) {
      $selecionado = $cardapio["tipo"] == $t ? "selected" : "";
      $tipo .= "<option $selecionado>$t</option>";
    }

    $baseUrl = $this -> baseUrl;
    # variável usada para indicar ao formulário que os campos devem estar preenchidos
    $acao = "editar";
    require "views/CardapioForm.php";
  }

  # método responsável por receber os dados do formulário e enviar para o Model
  public function atualizar() {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $foto = $_POST["foto"];

    # verifica se algo existe (o checkbox status está marcado)
    $status = isset($_POST["status"]) ? true : false;

    $acao = $_POST["acao"];

    # chama o método inserir que é rosponsável por gravar os dados na tabela
    if ($acao == "editar") {
      $idCardapio = $_POST["idCardapio"];
      $this -> cardapioModel -> update($idCardapio, $nome, $preco, $tipo, $descricao, $foto, $status);  
    } else {
      $this -> cardapioModel -> insert($nome, $preco, $tipo, $descricao, $foto, $status);
    }

    # redireciona o usuáio para a rota principal de cardapio-adm
    header("location: ". $this -> baseUrl."/cardapio-adm");
  }
}