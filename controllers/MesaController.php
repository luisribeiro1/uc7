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
        $id="";
        
        $lugares='<option></option>
        <option>2</option>
        <option>4</option>
        <option>6</option>
        <option>8</option>
        ';

        $tipo='
        <option></option>
        <option>Quadrada</option>
        <option>Redonda</option>
        <option>Oval</option>
        <option>Retangular</option>
        ';
        $acao = "criar";
        $arrayCaracteristicas = [];
        $arrayPeriodo = [];

        require "views/MesaForm.php";
    }


    public function editar($id){
        $mesa = $this->mesaModel->getById($id);
        
        // echo "<pre>";
        // var_dump($mesa);
        // echo "</pre>";
        
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
        $lugar = ["2","4", "6", "8"];
        $lugares = "<option></option>";
        foreach($lugar as $l){
            $selecionado = $mesa["lugares"] ==$l ? "selected" : "";
            $lugares.="<option $selecionado>$l</option>";
        }

        # quebra o texto usando a vírgula com separador e gera um array
        $arrayCaracteristicas = explode(",", $mesa['caracteristicas']);
        
        # Cria um array que recebe o outro array
        $arrayPeriodo = $mesa["disponibilidade"];

        $acao = "editar";
    
        require "views/MesaForm.php";
    }

    public function atualizar(){
        $id = $_POST["id"];
        $lugares = $_POST["lugares"]; 
        $tipo = $_POST["tipo"];
        $acao = $_POST["acao"];

        $arrayCaracteristicas = []; # crio o array vazio
        if(isset($_POST["caracteristicas"])){ # verifico se existe algum item marcado   
            $arrayCaracteristicas = $_POST["caracteristicas"];
        }
        
        $arrayPeriodo =[];
        if(isset($_POST["disponibilidade"])){
           $arrayPeriodo = $_POST["disponibilidade"];
        }
        
        
        if($acao == "editar"){
            $id = $_POST["id"];
            $resposta = $this->mesaModel->update($id, $lugares, $tipo, $arrayCaracteristicas, $arrayPeriodo);
        }else{
            $resposta = $this->mesaModel->insert($id, $lugares, $tipo, $arrayCaracteristicas, $arrayPeriodo);
        }

        if($resposta["sucesso"] == true){ # o registro foi inserido
            header("location:" . $this->url . "/mesa-adm");
            exit(); # garantir que nada seja executado após ele
        }else{ # Deu erro no model
            $mensagem = $resposta["mensagem"];
            require "views/ErroView.php";
        }

    }

}