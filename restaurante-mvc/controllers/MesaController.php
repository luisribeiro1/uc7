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



}

