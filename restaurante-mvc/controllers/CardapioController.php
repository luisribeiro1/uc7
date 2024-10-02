<?php

require_once "models/CardapioModel.php";


class CardapioController 
{

    private $url = "http://localhost/uc7/restaurante-mvc";

    private $cardapioModel;

    public function __construct(){
        
    # instancia a classe Mesa para obter os dados do model
        $this->cardapioModel = new Cardapio();
    }
    

public function index(){
$lista_do_cardapio = $this->cardapioModel->getAllCardapio();
$baseUrl = $this->url;

require "views/CardapioView.php";

}

public function excluir($id){
    $this->cardapioModel->delete($id);


    # redirecionar o usuario para a listagem de mesas 
    header("location: ".$this->url."/cardapio-adm");
}


# metodo responsavel pela rota criar (cardapio-adm/criar)
public function criar(){
    $baseUrl=$this->url;
    $tipo = "<option></option>
    <option>Prato Quente</option>
    <option>Prato Frio</option>
    <option>Sobresa</option>
    <option>Bebidas</option>
    <option>Outros</option>";
    require "views/CardapioForm.php";


}

# metodo responsavel por receber os dados do formulario e enviar para o model
public function atualizar(){
    $nome =$_POST["nome"];
    $preco =$_POST["preco"];
    $tipo =$_POST["tipo"];
    $descricao =$_POST["descricao"];
    $foto =$_POST["foto"];
    
    # isset verifica se algo existe, neste caso, se o checkbox esta marcado
    $status = isset($_POST["status"]) ? true : false;

    # chama o metodo inserir que é responsavel por gravar os dados fora da tabela
    $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);

    # redireciona o usuario para a rota principal de cardapio
    header("location: ".$this->url."/cardapio-adm");

}

}
