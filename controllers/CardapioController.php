<?php

# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url= "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $cardapioModel;

    public function __construct(){
        # Instancia a classe Cardapio para obter os dados do model
        $this->cardapioModel = new Cardapio();
    }
    
    public function index()
    {

        # Cria um objeto que receberá a lista de cardapio que o model retornará
        $lista_cardapio = $this->cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;
        
        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação
        require "views/CardapioView.php";
    }
    
    // Método responsável pela rota criar (cardapio-adm/criar)
    public function criar(){
        
        $acao = "criar";
        $idCardapio = "";
        $nome = "";
        $preco = "0";
        $descricao = "";
        $foto = "";
        $status = "";
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>Sobremesa</option>
        <option>Bebida</option>
        <option>Outros</option>";
        
        // Variavel usada para indicar ao formulário que os campos devem ficar vazios
        $baseUrl = $this->url;
        require "views/CardapioForm.php";
    }

    public function editar($idCardapio){
        $cardapio= $this->cardapioModel->getById($idCardapio);
        
        $nome = $cardapio["nome"];
        $preco = $cardapio["preco"];
        $tipo = $cardapio["tipo"];
        $descricao = $cardapio["descricao"];
        $foto = $cardapio["foto"];
        
        $status = $cardapio["status"] == true ? "checked" : "";

        $tipos = ["Prato quente", "Prato frio", "Sobremesa", "Bebida", "Outros"];

        $tipo = "<option></option>";
        
        foreach ($tipos as $t){
            $selecionado = $cardapio["tipo"] == $t ? "selected" : "";
            $tipo.= "<option $selecionado>$t</option>";
        }

        // Variavel usada para indicar ao formulário que os campos devem ficar preenchidos
        $baseUrl = $this->url;
        $acao = "editar";
        require "views/CardapioForm.php";
    }

    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar(){
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];

        // isset verifica se algo existe, nesse caso, se o checkbox está marcado
        $status = isset($_POST["status"]) ? true : false;

        $acao = $_POST["acao"];
        
        # Chama o método inserir que é responsável por gravar os dados na tabela
        if($acao=="editar"){
            $idCardapio = $_POST["idCardapio"];
            $this->cardapioModel->update($idCardapio,$nome,$preco,$tipo,$descricao,$foto,$status);
        }else{
            $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);
        }

        # Redirecionar o usuário para a rota principal de cardápio
        header("location: ".$this->url."/cardapio-adm");
    }

    public function excluir($id) {
        # Executa o método delete da classe de Model
        $this->cardapioModel->delete($id);

        # Redirecionar o usuário para a listagem de cardápios
        header("location: ".$this->url."/cardapio-adm");
    }
}