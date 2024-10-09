<?php

require_once "models/MesaModel.php";


class MesaController 
{
    # criar uma propriedade que recebera o endereço absoluto do site
    # este endereço será para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/restaurante-mvc";

    # cria a propriedade que sera usada nos metodos abaixos
    private $mesaModel;

    public function __construct(){
        
    # instancia a classe Mesa para obter os dados do model
        $this->mesaModel = new Mesa();
    }
    

public function index()
{
 


# cria um array que recebera a lista de mesas que o model retornara
$lista_de_mesas = $this->mesaModel->getAllMesas();

// recebe  valor da propriedade $url e fica disponivel para uso na view
$baseUrl = $this->url;

// importa a view que ira renderizar o template usando a variavel e o array acima 
// $lista_de_mesas (array com os dados) e $baseUrl com o endereço da aplicação
require "views/MesaView.php";

}

public function excluir($id){
    $this ->mesaModel->delete($id);


    # redirecionar o usuario para a listagem de mesas 
    header("location: ".$this->url."/mesa-adm");
}


# metodo responsavel pela rota criar (cardapio-adm/criar)
public function criar(){
    $baseUrl=$this->url;
    $tipo = "<option></option>
    <option>Mesa Quadrada</option>
    <option>Mesa Retangular</option>
    <option>Mesa Oval</option>
    <option>Mesa Redonda</option>
   ";
   $acao = "criar";
   

    require "views/MesaForm.php";


}

public function editar($id){
    $mesa = $this->mesaModel->getById($id);
    

    $tipos = ["Quadrada","Redonda", "Oval", "Retangular", "Outras"];
    $tipo = "<option></option>";
    foreach($tipos as $m){
        $selecionado = $mesa["tipo"] ==$m ? "selected" : "";
        $tipo.="<option $selecionado>$m</option>";
    }
    
    $baseUrl = $this->url;
 
    $acao = "editar";
    require "views/MesaForm.php";
}



public function atualizar(){
    $id =$_POST["id"];
    $lugares =$_POST["lugares"];
    $tipo =$_POST["tipo"];
   
    $acao = $_POST["acao"];
   
    $this->mesaModel->insert($id,$lugares,$tipo);

    if($acao== "editar"){
        $id = $_POST["id"];
    $this->mesaModel->update($id,$lugares,$tipo);
    }else{
    
    $this->mesaModel->insert($id,$lugares,$tipo);
    }
       
       header("location: ".$this->url."/mesa-adm");

}



}

