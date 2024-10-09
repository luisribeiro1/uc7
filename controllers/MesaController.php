<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController{
    
    # criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas 
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/restaurante-mvc";

    # propriedade(atributo) que será usada nos métodos abaixo
    private $mesaModel;

    public function __construct(){
        # Obter dados do model. Instancia a classe Mesa para obter os dados
        $this->mesaModel = new Mesa();
    }

public function index()
    { 
    # Cria um array que receberá a lista de mesas que o model retornará
    $lista_de_mesas = $this->mesaModel->getAllMesas();
    
    # recebe o valor da propriedade $url e fica disponivel para uso na view 
    $baseUrl = $this->url;
    
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_de_mesas(array com os dados) e $baseUrl com o endereço da aplicação 
    require "views/MesaView.php";
}

    public function excluir($id){
        #executa o delete da classe de model
        $this->mesaModel->delete($id);
        #redirecionar o usuario para a listagem de mesas
        header("location: " . $this->url . "/mesa-adm");
    }

    public function criar(){
        $baseUrl = $this->url;
        $tipo='
        <option></option>
        <option>Quadrada</option>
        <option>Redonda</option>
        <option>Oval</option>
        <option>Retangular</option>
        ';
        $acao = "criar";
        require "views/MesaForm.php";
    }


    public function editar($id){
        $mesa = $this->mesaModel->getById($id);
        $id = $mesa["id"]; 
        $lugares = $mesa["lugares"]; 
        $tipo = $mesa["tipo"];
        
        $baseUrl = $this->url;

        $mesas = ["Quadrada","Redonda", "Oval", "Retangular"];
        $tipo = "<option></option>";
        foreach($mesas as $m){
            $selecionado = $mesa["tipo"] ==$m ? "selected" : "";
            $tipo.="<option $selecionado>$m</option>";
        }
        
        $acao = "editar";
    
        require "views/MesaForm.php";
    }

    public function atualizar(){
        $id = $_POST["id"];
        $lugares = $_POST["lugares"]; 
        $tipo = $_POST["tipo"];
        
        $acao = $_POST["acao"];
        
        if($acao == "editar"){
            $id = $_POST["id"];
            $this->mesaModel->update($id, $lugares, $tipo);
        }else{
            $this->mesaModel->insert($id, $lugares, $tipo);
        }
        header("location:" . $this->url . "/mesa-adm");
    }

}