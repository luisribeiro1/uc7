<?php 

# Inclue o arquivo model.
require_once "models/CardapioModel.php";

class CardapioController {

     # Criar a propriedade que receberá o endereço absoluto do site.
    # Esse endereço será usado pata compor rotas.
    # $url é uma propriedade pois está sendo criada no escopo da classe.
    private $url = "http://localhost/uc7/restaurante-mvc";

    private $cardapioModel;

    
    public function __construct(){
        # Instancia a classe Cadaspios para obter dados do model.
        $this->cardapioModel = new Cardapio();
    }

    public function index(){
 
        # Cria um array que receberá a lista de mesas que o model retornará.
        $lista_de_cardapio = $this->cardapioModel->getAllCardapios();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view.
        $baseUrl = $this->url;

        # Importa a view que irá renderizar no template usando as variável e o array acima.
        # Lista_de_cadarpio (array com dados) e $baseUrl com o endereço da aplicação.
        require "views/CardapioView.php";
    }

    public function excluir($id){
        # Executa o método delete da classe de Model
        $this->cardapioModel->delete($id);

        # Redirecionar o usuário para a Listagem de itens no cardapio.
        header("location: ".$this->url."/cardapio-adm");
    }

    // Método responsável pela rota criar (cardapio-adm/criar)
    public function criar(){
        $baseUrl = $this->url;
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>Sobremesa</option>
        <option>Bebida</option>
        <option>Outros</option>
        ";
        require "views/CardapioForm.php";
    }

    // Método responsável por receber os dados do formulário e enviar para o model.
    public function atualizar(){
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];
        
        // isset verifica se algo existe, neste caso, se o checkbox está marcado.
        $status = isset($_POST["status"]) ? true : false;

        // Chama o método inserir que é responsável por gravar os dados na tabela.
        $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);

        // Redireciona o usuário para a rota principal de cardápio.
        header("location: ".$this->url."/cardapio-adm");
    }
}