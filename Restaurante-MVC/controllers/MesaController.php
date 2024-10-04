<?php

# inclui  o arquivo model
require_once "models/MesaModel.php";

class MesaController


{ 
    # criar a propriedade que recebe o endereço absoluto do site
    # este endereço será usado para compor as notas
    # url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/restaurante-mvc";

    # cria a propriedade que sera usada nos estados abaixo
    private $mesaModel; 

    public function __construct(){
        #instância  a classe  mesa para obter os dados do model
        $this->mesaModel = new Mesa();
    } 


    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
        // $mesaModel = new Mesa();
        # cria um array que recebe a lista de mesa que o model retornará
        $lista_de_mesas = $this->mesaModel->getAllMesas();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->url;

        # importa a view que irá rederizar o tamplate usando a variavel e o array acima:
        # lista_de_mesas (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/MesaView.php";
    }

    public function criar (){
        $baseUrl = $this->url;
        $tipo = "<option></option>
        <option>Prato quente</option>
        <option>Prato frio</option>
        <option>sobremesas</option>
        <option>Bebidas</option>
        <option>Outros</option>";
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

        // chama o metodo inserir que é responsavel por gravar os dados na tabela
        $this->cardapioModel->insert($nome,$preco,$tipo,$descricao,$foto,$status);

        //Rerideciona o usuario para a rota  principal de cardapio
        header("location:".$this->url."/mesa-adm");

    public function excluir($id){
        $this->mesaModel->delete($id);
        # reridicinar o usuario para a listagem de mesas
        header("location: ".$this->url."/mesa-adm");

    }

    
}

