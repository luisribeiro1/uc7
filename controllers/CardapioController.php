<?php
# Inclue o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    # Criar a propriedade que recebera p endereço absoluto do site, este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos méstodos abaixos
    private $cardapioModel;

    public function __construct() {
                
        # Instancia a classe Mesa para os dados do model 
        $this->cardapioModel = new Cardapio();
    }

    public function index()
    {
        # Instancia a classe Mesa para os dados do model 
        $cardapioModel = new cardapio();

        # Cria um array que receberá a lista de mesas que o model retornará 
        $lista_do_cardapio = $cardapioModel->getAllCardapio();

        # recebe o valor da propriedade $url a fica disponivel para uso na view
        $baseUrl = $this->baseUrl;

        # Importar a view que irá renderizar o template usando as variaveis acima:
        // $listas_do_cardapio (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/CardapioView.php";
    }

    public function excluir($id){
        # Executa o método delete da classe de Model
        $this->cardapioModel->delete($id);

        # redirecionar o usuário para a listagem de mesas
        header("location: ".$this->baseUrl."/cardapio-adm");
    }

    // Método responsavel pela rota criar (cardapio-adm/criar)
    public function criar(){
        $baseUrl = $this->baseUrl;

        $nome = "";
        $preco = "";
        $descricao = "";
        $foto = "";
        $status = false;
        
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>Sobremesa</option>
        <option>Bebida</option>
        <option>Outros</option>";

        // Variável usada íra indicar ao formulário que os campos devem ficar vazio
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

        $tipos = ["Prato quente","Prato frio","Sobremesa","Bebidas","Outros"];

        $tipo = "<option></option>";
        foreach ($tipos as $t){
            $selecionado = $cardapio["tipo"] == $t ? "selected" : "";
            $tipo .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->baseUrl;

        // Variável usada íra indicar ao formulário que os campos devem ficar vazio
        $acao = "editar";
        require "views/CardapioForm.php";

    }

    # Método responsavel por receber os dados do formulário e enviar para o model
    public function atualizar(){
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];

        // inssert verifica se algo existe, neste caso, se o checkbox está marcado
        $status = isset($_POST["status"])? true : false;

        $acao = $_POST["acao"];

        // Chama o método inserir que é responsavel por gravar os dados na tabela
        if($acao== "editar"){
            $idCardapio = $_POST["idCardapio"];
            $this->cardapioModel->update($idCardapio,$nome,$preco,$tipo,$descricao,$status,$foto);
        }else{
            $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$status,$foto);
        }
        
        // Redireciona o usuario para a rota principal de cardapio
        header("location: ".$this->baseUrl."/cardapio-adm");
    }
}