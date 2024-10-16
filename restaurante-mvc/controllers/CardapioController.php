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

public function ver_cardapio(){
    $lista_cardapio  = $this->cardapioModel->getAllCardapio();
    $baseUrl = $this->url;
    echo "Pagina do cardapio do cliente";
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
public function editar($idCardapio){
    $cardapio = $this->cardapioModel->getById($idCardapio);
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
   
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    
    $status = $cardapio["status"]==true ? "checked" : "";

    $tipos = ["Prato Quente","Prato Frio", "Sobremesa", "Bebida", "Outros"];
    $tipo = "<option></option>";
    foreach($tipos as $t){
        $selecionado = $cardapio["tipo"] ==$t ? "selected" : "";
        $tipo.="<option $selecionado>$t</option>";
    }
    
    $baseUrl = $this->url;
    // Variável usada para indicar ao formulário que os campos devem ser preenchidos
    $acao = "editar";
    require "views/CardapioForm.php";
}




public function atualizar(){
    # $_POST pega os dados de formulário
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $foto = $_POST["foto"];
    // isset verifica se algo existe, neste caso, se checkbox está marcado
    $status = isset($_POST["status"])? true : false;

    $acao = $_POST["acao"];

    # chama o método inserir que é responsável por gravar os dados 
    if($acao == "editar"){
        $idCardapio = $_POST["idCardapio"];
    $this->cardapioModel->update($idCardapio, $nome,$preco,$tipo,$descricao,$foto,$status);
    }else{
    
    $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);
    }
    # redireciona o usuário para a rota principal de cardápio
    header("location:" . $this->url . "/cardapio-adm");
}


}
