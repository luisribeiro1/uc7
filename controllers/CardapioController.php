<?php

require_once "models/CardapioModel.php";

class CardapioController
{
    
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc7/restaurante-MVC";

    private $cardapioModel;

    public function __construct(){
        $this->cardapioModel = new Cardapio();
        
    }
    
    public function index(){
        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_cardapio = $this->cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        
        $baseUrl = $this->url;
        
        
        # Importa a view que irá renderizar o template usando as variaveis acima:
        # $Lista_de_mesas (array com os dados ) e $baseUrl
        require "views/CardapioView.php";
    }
    
    public function excluir($id){
        $this->cardapioModel->delete($id);
        
        header("location: ".$this->url. "/cardapio-adm");
    }
    
    // Método Responsável pela rota criar (cardapio-adm/criar)
    public function criar(){
        $baseUrl = $this->url;
        
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>Sobremesas</option>
        <option>Bebida</option>
        <option>Outros</option>";
        

        // Variável usada para indicar ao formulário que os campos devem ficar vazio
        $acao = "criar";
        require "views/CardapioForm.php";
        
    }

    public function editar($idCardapio){
        $cardapio = $this->cardapioModel->getById($idCardapio);
        $nome = $cardapio["nome"];
        $preco = $cardapio["preco"];
        $tipo = $cardapio["tipo"];
        $descricao = $cardapio["descricao"];
        $foto = $cardapio["foto"];
        
        
        $status = $cardapio["status"]== true ? "checked": "";
        
        $tipos = ["Prato Quente", "Prato Frio", "Sobremesas", "Bebida", "Outros"];       
        $tipo = "<option></option>";

        foreach($tipos as $t) {
            $selecionado = $cardapio["tipo"] == $t ? "selected" : "";
            $tipo .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->url;
        
        // Variável usada para indicar ao formulário que os campos devem ficar vazio
        $acao = "editar";
        require "views/CardapioForm.php";
    }

    // Método responsavel por receber os dados do formulario e enviar para o model

    //$_POST pega 
    //$_GET 
    public function atualizar() {
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];
        
        // isset verifica se algo existe, neste caso, se o checkbox está marcado
        $status = isset($_POST["status"]) ? true : false;
    
        $acao = $_POST["acao"];

        // Chama o método inserir que é responsável por gravar os dados na tabela
        if($acao=="editar"){
            $idCardapio = $_POST["idCardapio"];
            $this->cardapioModel->update($idCardapio,$nome,$preco,$tipo,$descricao,$foto,$status);
        }else{
            $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);
        }
        
        // Redireciona o usuário para a rota principal de cardápio
        header("location: ". $this->url . "/cardapio-adm");
    }
}