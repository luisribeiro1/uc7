<?php

# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    
    private $url = "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $mesaModel;

    public function __construct(){
        # Instancia a classe Mesa para obter os dados do model
        $this->mesaModel = new Mesa();
    }
    
    public function index()
    {

        # Cria um objeto que receberá a lista de mesas que o Model retornará
        $lista_de_mesas = $this->mesaModel->getAllMesas();
        
        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação
        require "views/MesaView.php";
    }

    // Método responsável pela rota criar (cardapio-adm/criar)
    public function criar(){
        $baseUrl = $this->url;

        $tipo = "<option></option>
        <option>quadrada</option>
        <option>redonda</option>
        <option>oval</option>
        <option>retangular</option>";

        require "views/MesaForm.php";
    }

    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar(){
        $id = $_POST["id"];
        $tipo = $_POST["tipo"];
        $lugares = $_POST["lugares"];

        // isset verifica se algo existe, nesse caso, se o checkbox está marcado
        $status = isset($_POST["status"]) ? true : false;

        # Chama o método inserir que é responsável por gravar os dados na tabela
        $this->mesaModel->insert($id,$tipo,$lugares);

        # Redirecionar o usuário para a rota principal das mesas
        header("location: ".$this->url."/mesa-adm");
    }

    public function excluir($id) {
        # Executa o método delete da classe de Model
        $this->mesaModel->delete($id);

        # Redirecionar o usuário para a listagem de mesas
        header("location: ".$this->url."mesa-adm");
    }
}