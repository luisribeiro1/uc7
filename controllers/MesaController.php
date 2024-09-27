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
}