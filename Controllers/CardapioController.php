<?php

# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url= "http://localhost/uc7/restaurante-mvc";

    private $cardapioModel;

    public function __construct(){
        $this->cardapioModel = new Cardapio();
    }
    
    public function index()

    {
        # Instancia a classe Cardapio para obter os dados do model
        #$cardapioModel = new Cardapio();

        # Cria um objeto que receberá a lista de cardapio que o model retornará
        $lista_cardapio = $this->cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação
        require "views/CardapioView.php";
    }
    // Método responsavel pela a rota criar (cardapio-adm/criar)
    public function criar(){
        $baseUrl = $this->url;
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>Sobremesa</option>
        <option>Bebida</option>
        <option>Outros</option>";

        require "views/CardapioForm.php";
    }

    // metodo responsavel por resceber dados do formulario e enviar para o model

    public function atualizar(){
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];

        //inser verifica se algo existe, neste caso se o checkbox esta marcado
        $status = isset($_POST["foto"]) ? true : false;
        //cham o metodo inserir qu eé responsavel por gravar os dados na tabela
        $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);
        // Redireciona o usuaripo para a rota principal do cardapio
        header("location: ". $this->url."/cardapio-adm");
    }

    public function excluir($id) {
        $this->cardapioModel->delete($id);

        header("location:".$this->url."cardapio-adm");
    }

}