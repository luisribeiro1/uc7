<?php

# inclui  o arquivo model
require_once "models/CardapioModel.php";

class CardapioController
{
    # criar a propriedade que recebe o endereço absoluto do site
    # este endereço será usado para compor as notas
    # url é uma propriedade pois está sendo criada no escopo da classe
    private $cardapioModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # cria a propriedade que sera usada nos estados abaixo
    
    
    public function __construct(){
        #instância  a classe  mesa para obter os dados do model
        $this->cardapioModel = new Cardapio();
    } 



    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
       // $cardapioModel = new Cardapio();
        # cria um array que recebe a lista de mesa que o model retornará
        $lista_de_cardapio = $this->cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->baseUrl;

        # importa a view que irá rederizar o tamplate usando a variavel e o array acima:
        # lista_de_cardapio (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/CardapioView.php";
    }

    public function ver_cardapio()    
    {
        # instancia a classe Mesa para obter dados do Model
        $cardapio = $this->cardapioModel->getAllCardapio();
        # cria um array que recebe a lista de mesa que o model retornará
        //require "views/CardapioView.php";
        $baseUrl = $this->baseUrl;
        echo "Pagina do Cardapio versao usuario";

        # Recebe o valor da propriedade $url e fica disponivel para uso na view   

        # importa a view que irá rederizar o tamplate usando a variavel e o array acima:
        # lista_de_cardapio (array com os dados) e $baseUrl com o endereço da aplicação
    }


    public function ver(){
    
        # instancia a classe Mesa para obter dados do Model
        $cardapio = $this->cardapioModel->getAllCardapio();
        # cria um array que recebe a lista de mesa que o model retornará
        //require "views/CardapioView.php";
        $baseUrl = $this->baseUrl;
        echo "Pagina do Cardapio";

        # Recebe o valor da propriedade $url e fica disponivel para uso na view   

        # importa a view que irá rederizar o tamplate usando a variavel e o array acima:
        # lista_de_cardapio (array com os dados) e $baseUrl com o endereço da aplicação
    }
    # Metodo responsavel pela rota criar (cardapio-adm/criar)
    public function criar (){
        $baseUrl = $this->baseUrl;
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>sobremesas</option>
        <option>Bebidas</option>
        <option>Outros</option>";

        $nome = "";
        $preco = "";
        $descricao="";
        $foto="";

        $status = isset($_POST ["status"])==true ?  "checked" : "";

        //variavel usada para indicar ao formulário que os campos devem ficar vazio
        $acao = "criar";
        require "views/CardapioForm.php";


    }

    public function editar($idCardapio){
        $cardapio = $this->cardapioModel->getByld($idCardapio);
        $nome = $cardapio["nome"];
        $preco = $cardapio["preco"];
        $descricao= $cardapio["descricao"];
        $foto= $cardapio["foto"];

        $status = $cardapio["status"]==true ? "checked" : "";
        $tipos = ["Prato quente","Prato frio","Sobremesa","Bebida","Outros" ];
        
        $tipo = "<option></option>";
        foreach ($tipos as $t){
            $selecionado = $cardapio["tipo"]== $t ? "selected" : "";
            $tipo .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->baseUrl;
        //variavel usada para indicar ao formulário que os campos devem ficar vazio
        $acao = "editar";
        require "views/CardapioForm.php";
      
    }
    //Metodo responsavel por receber os dados do formulario e enviar para o model
    public function atualizar(){
        $nome = $_POST["nome"];        
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];
        // inset verifica se algo existe , neste, caso se o chechbox esta marcado
        $status = isset($_POST["status"]) ? true : false;

        $acao = $_POST["acao"];
        

        // chama o metodo inserir que é responsavel por gravar os dados na tabela
        if($acao == "editar"){
            $idcardapio = $_POST["idcardapio"];
            $this->cardapioModel->update($idcardapio, $nome,$preco,$tipo,$descricao,$foto,$status);
        }else{
            $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);
        }

        //$this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);

        //Rerideciona o usuario para a rota  principal de cardapio
        header("location:".$this->baseUrl."/cardapio-adm");
    }
    public function excluir($idCardapio){
        $this->cardapioModel->delete($idCardapio);
        # reridicinar o usuario para a listagem de mesas
        header("location: ".$this->baseUrl."/cardapio-adm");

    }    

}