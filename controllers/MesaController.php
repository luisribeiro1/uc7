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
        
        $lugares = "<option></option>
        <option>2</option>
        <option>4</option>
        <option>6</option>
        <option>8</option>
        <option>10</option>
        <option>12</option>";

        $acao = "criar";
        require "views/MesaForm.php";
    }
    
    public function editar($id){
        $mesa = $this->mesaModel->getById($id);

        //var_dump($mesa);
        
        $tipo = $mesa["tipo"];
        
        $tipos = ["Quadrada", "Redonda", "Retangular", "Oval"];
        
        $tipo = "<option></option>";
        
        foreach ($tipos as $t){
            $selecionado = $mesa["tipo"] == $t ? "selected" : "";
            $tipo.= "<option value='$t' $selecionado>$t</option>";
        }
        
        $lugares = $mesa["lugares"];
        
        $location = ["2", "4", "6", "8", "10", "12"];

        $lugares = "<option></option>";
        
        foreach ($location as $l){
            $selection = $mesa["lugares"] == $l ? "selected" : "";
            $lugares.= "<option value='$l' $selection>$l</option>";
        }

        # Quebra o texto usando a virgula com o separador e gera um array
        $arrayCaracteristicas = explode(",", $mesa["caracteristicas"]);

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

        $arrayCaracteristicas = [];                         # Crio o array vazio
        if(isset($_POST["caracteristicas"])) {              # Verifico se existe algum item marcado
            $arrayCaracteristicas = $_POST["caracteristicas"];
        }
        //var_dump($arrayCaracteristicas);
       # Chama o método inserir que é responsável por gravar os dados na tabela
       if($acao=="editar"){
        $id = $_POST["id"];
        $resposta = $this->mesaModel->update($id,$tipo,$lugares, $arrayCaracteristicas);
    }else{
        $id = $_POST["id"];
        $resposta = $this->mesaModel->insert($id,$tipo,$lugares, $arrayCaracteristicas);
    }

    if($resposta["sucesso"] == true) {              // Registro foi inserido

        # Redirecionar o usuário para a listagem de cardápios
        header("location: ".$this->url."/mesa-adm");
        exit();
    } else{                                         // Deu erro no Model
        $mensagem = $resposta["mensagem"];
        require "views/ErroView.php";
    }
    }

    public function excluir($id) {
        # Executa o método delete da classe de Model
        $resposta = $this->mesaModel->delete($id);

        if($resposta["sucesso"] == true) {              // Registro foi inserido

            # Redirecionar o usuário para a listagem de cardápios
            header("location: ".$this->url."/mesa-adm");
            exit();
        } else{                                         // Deu erro no Model
            $mensagem = $resposta["mensagem"];
            require "views/ErroView.php";
        }

    }
}