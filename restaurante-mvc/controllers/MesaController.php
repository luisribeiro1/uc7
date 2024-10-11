<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    // criar a propriedade que recebera o endereço absoluto do site
    // este endereço sera usado para compor as rotas
    // url é uma propriedade pois esta sendo criada no escopo da classe
    private $url = "http://localhost/uc7/restaurante-mvc";

    private $mesaModel;

    public function __construct(){
        $this->mesaModel = new Mesa();
    }
    public function index()
    {
        
       // $mesaModel = new Mesa();
        # cria um array que recebera a lista de mesas que o model retornara
        $lista_de_mesas =$this->mesaModel->getAllMesas();

        // recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->url;

        # importa a view que ira renderizar o template usado as variaveis acima:
        // $lista_de_mesas (array com os dois) e $baseUrl com os endereço da aplicação
        require "views/MesaView.php";
    }

    public function excluir($id){
        $this->mesaModel->delete($id);
        header("location: ".$this->url."/mesa-adm");
    }

    public function criar(){
        $baseUrl = $this->url;
        $tipo= "<option></option>
          <option>Mesa Redonda</option>
          <option>Mesa Retangular</option>
          <option>Mesa Oval</option>
          <option>Mesa Quadrada</option>
          ";

          $acao = "criar";
        require "views/MesaForm.php";
    }

   
    public function atualizar(){
        $id = $_POST["id"];
        $lugares = $_POST["lugares"];
        $tipo = $_POST["tipo"];
        $acao = $_POST["acao"];
       
        $baseUrl = $this->url;
    
        if($acao=="editar"){
            $id = $_POST["id"];
  $this->mesaModel->update($id,$lugares,$tipo);
}else{
        $this->mesaModel->insert($id,$lugares,$tipo);
    }
      

       
        header("location: " . $this->url."/mesa-adm");
    }


    public function editar($id){
        $mesa = $this->mesaModel->getById($id);
        $id = $mesa["id"];
        $lugares = $mesa["lugares"];
        $tipo = $mesa["tipo"];
     
        $tipos = ["Mesa Redonda","Mesa Quadrada","Mesa Retangular","Mesa Oval"];
        $tipo= "<option></option>";
        foreach($tipos as $m){
         $selecionado = $mesa["tipo"] == $m ? "selected" : "";
         $tipo .= "<option $selecionado>$m</option>";
        }
      
      $baseUrl = $this->url;
        
      $acao = "editar";
      require "views/MesaForm.php";
 
    }
}


