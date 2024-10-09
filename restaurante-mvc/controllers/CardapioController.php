<?php

# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    private $url = "http://localhost/uc7/restaurante-mvc";
  
    private $cardapioModel;

    public function __construct(){

        $this->cardapioModel = new Cardapio();
    }

    public function index()

    {
        # Instancia a classe mesa para obter dados do model
       $cardapioModel = new Cardapio();

        # cria um array que recebera a lista de mesas que o model retornara
        $lista_do_cardapio = $cardapioModel->getAllCardapio();

        $baseUrl = $this->url;


        # Passar os dados do array para ser renderizado na view
        require "views/Cardapioview.php";
    }

    public function excluir($id){
        $this->cardapioModel->delete($id);

        header("location:".$this->url."/cardapio-adm");
    }

    // Método responsavel pela nota criar(cardapio-adm/criar)
    public function criar(){
        $url = $this->url;
        $tipo= "<option></option>
          <option>Prato quente</option>
          <option>Prato frio</option>
          <option>Sobremesas</option>
          <option>Bebidas</option>
          <option>Outros</option>
          ";

          // Variavel usada para indicar ao formulario que os campos devem ficar vazio
          $acao = "criar";
        require "views/CardapioForm.php";
    }

    public function editar($idCardapio){
       $cardapio = $this->cardapioModel->getById($idCardapio);
       $nome = $cardapio["nome"];
       $preco = $cardapio["preco"];
       $descricao = $cardapio["descricao"];
       $foto = $cardapio["foto"];

       $status = $cardapio["status"]==true ? "checked" : "";

       $tipos = ["Prato quente","Prato frio","Sobremesas","Bebidas","Outros"];
       $tipo= "<option></option>";
       foreach($tipos as $t){
        $selecionado = $cardapio["tipo"] == $t ? "selected" : "";
        $tipo .= "<option $selecionado>$t</option>";
       }
     
     $baseUrl = $this->url;
       // Variavel usada para indicar ao formulario que os campos devem ficar vazio
     $acao = "editar";
     require "views/cardapioForm.php";

    }

    // Método responsavel por receber os dados do formulario e enviar para o model
    public function atualizar(){
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];
       
        // isset verifica se algo existe, neste caso,se o  checkbox esta marcado
        $status = isset($_POST["status"]) ? true : false;

        $acao = $_POST["acao"];
        

        // chama o metodo inserir que é responsavel por gravar os dados na tabela
        if($acao == "editar"){
            $idCardapio = $_POST["idCardapio"];
            $this->cardapioModel->update($idCardapio, $nome,$preco,$tipo,$descricao,$idCardapio,$status);
        }else{
            $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$idCardapio,$status);
        }
        // Redirecionar o usúario para a rota principal de cardapio
        header("location: " . $this->url."/cardapio-adm");
    }
}