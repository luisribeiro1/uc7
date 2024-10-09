<?php
# inclui o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
  # url é uma propriedade pois está sendo criada dentro da classe
  # criar uma propriedade que receba o endereço absoluto do site
  # este endereço será usado para compor as rotas
  public $baseUrl = "http://localhost/uc7/restaurante-mvc";

  # cria a proprieadade que será usada nos métodos a seguir
  private $mesaModel;

  public function __construct()
  {
    # instancia a classe Mesa para obter os dados do model
    $this -> mesaModel = new Mesa;
  }

  public function index() {

    # cria um array que recebe a lista de mesas que o model retornará
    $lista_de_mesas = $this -> mesaModel -> getAllMesas();

    # recebe o valor da propriedade $url e fica disponível para uso da view
    $baseUrl = $this -> baseUrl;

    # importa a view que irá renderizar o template usando as variáveis acima:
    # $lista_de_mesas (array com os dados) e $baseUrl (com o endereço da aplicação)
    require "views/MesaView.php";
  }

  public function excluir($id){
    # executa o método da classe de Mdel
    $this -> mesaModel -> delete($id);
    
    # redireciona o usuário para a listagem de mesas
    header("location: ".$this->baseUrl."/mesa-adm");
  }

  # método responsável pela rota criar (mesa-adm/criar)
  public function criar() {
    $baseUrl = $this -> baseUrl;
    $tipo = "<option></option>
    <option>Quadrada</option>
    <option>Retangular</option>
    <option>Meia lua</option>
    <option>Redonda</option>
    ";
    $acao = "criar";
    require "views/MesaForm.php";
  }

  public function editar($id) {
    $mesas = $this -> mesaModel -> getById($id);
    $lugares = $mesas["lugares"];

    $tipos = ["Quadrada", "Retangular", "Meia lua", "Redonda"];
    $tipo = "<option></option>";
    foreach ($tipos as $t) {
      $selecionado = $mesas["tipo"] == $t ? "selected" : "";
      $tipo .= "<option $selecionado>$t</option>";
    }

    $baseUrl = $this -> baseUrl;
    $acao = "editar";
    require "views/MesaForm.php";
  }

  # método responsável por receber os dados do formulário e enviar para o Modal
  public function atualizar() {
    $id = $_POST["id"];
    $lugares = $_POST["lugares"];
    $tipo = $_POST["tipo"];

    $acao = $_POST["acao"];
    
    if ($acao == "editar") {
      $id = $_POST["id"];
      $this -> mesaModel -> update($id, $lugares, $tipo);
    } else {
      # chama o método insrir que é responsável por gravar os dados na tabela
      $this -> mesaModel -> insert($id, $lugares, $tipo);
    }

    # redireciona o usuáio para a rota principal de mesa-adm
    header("location: ". $this -> baseUrl."/mesa-adm");
  }
}