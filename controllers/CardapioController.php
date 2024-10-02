<?php

require_once "models/CardapioModel.php";

class CardapioController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    
    private $cardapioModel;
    
    public function __construct(){
        # Obter dados do model. Instancia a classe Mesa para obter os dados
        $this->cardapioModel = new Cardapio();
    }
    public function index(){
    
    $lista_cardapio = $this->cardapioModel->getAllCardapio();
    
    $baseUrl = $this->url;
    # importa a view que ira renderizar o template usando as variáveis acima: 
    # $lista_cardapio(array com os dados) e $baseUrl com o endereço da aplicação
    require "views/CardapioView.php";
}

    public function excluir($id){
        $this->cardapioModel->delete($id);
        header("location:" . $this->url . "/cardapio-adm");
    }

    # método responsável pela rota criar (cárdapio-adm/criar)
    public function criar(){
        $baseUrl = $this->url;
        $tipo = "
            <option></option>
            <option>Prato Quente </option>
            <option>Prato Frio</option>
            <option>Sobremesa</option>
            <option>Bebida</option>
            <option>Outros</option>
        ";
        require "views/CardapioForm.php";
    }

    // método responsável por receber os dados do fomulário e enviar para o model 
    public function atualizar(){
        # $_POST pega os dados de formulário
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];
        // isset verifica se algo existe, neste caso, se checkbox está marcado
        $status = isset($_POST["status"])? true : false;
        # chama o método inserir que é responsável por gravar os dados 
        $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);
        # redireciona o usuário para a rota principal de cardápio
        header("location:" . $this->url). "/cardapio-adm";
    }

}

