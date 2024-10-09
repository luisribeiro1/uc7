<?php
# Inclue o arquivo model
require_once "models/MesaModel.php";

class MesaController
{
    # Criar a propriedade que recebera p endereço absoluto do site, este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos méstodos abaixos
    private $mesaModel;

    public function __construct() {
        
        # Instancia a classe Mesa para os dados do model 
        $this->mesaModel = new Mesa();
    }

    public function index()
    {

        # Cria um array que receberá a lista de mesas que o model retornará 
        $lista_de_mesas = $this->mesaModel->getAllmesas();

        # recebe o valor da propriedade $url a fica disponivel para uso na view
        $baseUrl = $this->baseUrl;

        # Importar a view que irá renderizar o template usando as variaveis acima:
        // $listas_do_mesa (array com os dados) e $baseUrl com o endereço da aplicação
        require "views/MesaView.php";
    }

    public function excluir($id){
        # Executa o método delete da classe de Model
        $this->mesaModel->delete($id);

        # redirecionar o usuário para a listagem de mesas
        header("location: ".$this->baseUrl."/mesa-adm");
    }

    public function criar(){
        $baseUrl = $this->baseUrl;

        $tipo = "<option></option>
        <option>Quadrada</option>
        <option>Retangular</option>
        <option>Redonda</option>
        <option>Canto alemão</option>
        <option>Bancada</option>
        <option>Outros</option>";

        $acao = "criar";
        require "views/MesaForm.php";
    }

    public function editar($id){
        $mesas = $this->mesaModel->getById($id);
        $id = $mesas["id"];
        $lugares = $mesas["lugares"];

        $tipos = ["Quadrada","Retangular","Redonda","Canto alemão","Bancada","Outros"];
        $tipo = "<option></option>";
        foreach ($tipos as $t){
            $selecionado = $mesas["tipo"] == $t ? "selected" : "";
            $tipo .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->baseUrl;

        $acao = "editar";
        require "views/MesaForm.php";
    }

    public function atualizar(){
        $id = $_POST["mesa"];
        $lugares = $_POST["lugares"];
        $tipo = $_POST["tipo"];

        $acao = $_POST["acao"];

        if($acao== "editar"){
            $id = $_POST["id"];
            $this->mesaModel->update($id,$lugares,$tipo);
        }else{
            $this->mesaModel->insert($id,$lugares,$tipo);
        }

        header("location: ".$this->baseUrl."/mesa-adm");
    }
}