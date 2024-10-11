<?php 
# Inclue o arquivo model    
require_once "models/MesaModel.php";

class MesaController
{
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc7/restaurante-MVC";
    
    # Cria a propriedade que será usada nos métodos abaixo
    private $mesaModel; 

    public function __construct() {

      # instancia a classe mesa para obter os dados do model
      $this->mesaModel = new Mesa();
    }

    public function index(){


        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_mesas = $this->mesaModel->getAllMesas();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variaveis acima:
        # $Lista_de_mesas (array com os dados ) e $baseUrl
      require "views/MesaView.php";
    }

    public function excluir($id) {
      # Executa o método delete da classe Model
      $this->mesaModel->delete($id);

      # Redirecionar o usuario para a listagem de mesas 

    header("location: ".$this->url. "/mesa-adm");
    }

    # Método responsável pelo método criar (mesa-adm/criar)
    public function criar() {
      $id = "";
      $tipo = "<option></option>
      <option>Quadrada</option>
      <option>Retangular</option>
      <option>Oval</option>
      <option>Redonda</option>
      ";
      
      $lugares = "<option></option>
      <option>2</option>
      <option>4</option>
      <option>6</option>
      <option>8</option>
      ";
      
      $acao = "criar";
      $baseUrl = $this->url;
      
        require "views/MesaForm.php";
      }

    public function editar($id) {
      $mesa = $this->mesaModel->getById($id);
      #$id = $mesa["id"];
      $lugares = $mesa["lugares"];
      $tipo = $mesa["tipo"];

      $tipos = ["Quadrada","Retangular","Oval","Redonda"];
      $local = ["2","4","6","8"];

      $tipo = "<option></option>";
      $lugares = "<option></option>";

      foreach($tipos as $t) {
        $selecionado = $mesa["tipo"] == $t ? "selected" : "";
        $tipo .= "<option $selecionado>$t</option>";
      }

      foreach($local as $t) {
        $selecionado = $mesa["lugares"] == $t ? "selected" : "";
        $lugares .= "<option $selecionado>$t</option>";
      }

      $baseUrl = $this->url;
      # Variável usada para indicar ao formulário que os campos devem ficar vazio
      
      $acao = "editar";
        
      require "views/MesaForm.php";
    }

    # Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar() {
        $id = $_POST["id"];
        $lugares = $_POST["lugares"];
        $tipo = $_POST["tipo"];

        $acao = $_POST["acao"];

        if($acao == "editar") {
          $id = $_POST["id"];
          $this->mesaModel->update($id,$lugares,$tipo);
        }else{
          $this->mesaModel->insert($id,$lugares,$tipo);
        }

      header("location: " . $this->url . "/mesa-adm");
     }
}