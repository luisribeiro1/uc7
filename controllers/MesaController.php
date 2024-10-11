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

    // Método responsável pela rota criar (mesa-adm/criar)
    public function criar(){
        $baseUrl = $this->url;

        $tipo = "<option></option>
        <option>Quadrada</option>
        <option>Redonda</option>
        <option>Oval</option>
        <option>Retangular</option>";

        $acao = "criar";
        require "views/MesaForm.php";
    }
    
    public function editar($id){
        $mesa = $this->mesaModel->getById($id);
        
        $tipo = $mesa["tipo"];
        $lugares = $mesa["lugares"];

        $tipos = ["Quadrada", "Redonda", "Retangular", "Oval"];

        $tipo = "<option></option>";
        
        foreach ($tipos as $t){
            $selecionado = $mesa["tipo"] == $t ? "selected" : "";
            $tipo.= "<option value='$t' $selecionado>$t</option>";
        }

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/MesaForm.php";
    }
    

    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar(){

        $id = $_POST["id"];
        $tipo = $_POST["tipo"];
        $lugares = $_POST["lugares"];

        $acao = $_POST["acao"];

       # Chama o método inserir que é responsável por gravar os dados na tabela
       if($acao=="editar"){
        $this->mesaModel->update($id,$tipo,$lugares);
    }else{
        $this->mesaModel->insert($id,$tipo,$lugares);
    }

        # Redirecionar o usuário para a rota principal de cardápio
        header("location: ".$this->url."/mesa-adm");
    }

    public function excluir($id) {
        # Executa o método delete da classe de Model
        $this->mesaModel->delete($id);

        # Redirecionar o usuário para a listagem de cardápios
        header("location: ".$this->url."/mesa-adm");
    }
}