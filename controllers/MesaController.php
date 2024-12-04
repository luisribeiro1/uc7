<?php

# Inclue o arquivo model.
require_once "models/MesaModel.php";

class MesaController
{
    # Criar a propriedade que receberá o endereço absoluto do site.
    # Esse endereço será usado pata compor rotas.
    # $url é uma propriedade pois está sendo criada no escopo da classe.
    private $url = "http://localhost/uc7/restaurante-mvc";

    # Cria a propriedade que será usada nos métodos abaixo
    private $mesaModel;

    public function __construct()
    {
        # Instancia a classe Mesa para obter dados do model.
        $this->mesaModel = new Mesa();
    }

    public function index()
    {

        # Cria um array que receberá a lista de mesas que o model retornará.
        $lista_de_mesas = $this->mesaModel->getAllMesas();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view.
        $baseUrl = $this->url;

        # Importa a view que irá renderizar no template usando as variável e o array acima.
        # Lista_de_mesas (array com dados) e $baseUrl com o endereço da aplicação.
        require "views/MesaView.php";
    }

    public function excluir($id)
    {
        # Executa o método delete da classe de Model
        $resposta = $this->mesaModel->delete($id);

        if ($resposta["sucesso"] == true) { # Registro foi inserido

            header("location: " . $this->url . "/mesa-adm");
            exit();

        } else { # Deu erro no model.
            $mensagem = $resposta["mensagem"];
            require "views/ErroView.php";
        }

    }

    public function criar()
    {
        $lugares = "<option></option>
        <option>2</option>
        <option>4</option>
        <option>6</option>
        <option>8</option>";

        $baseUrl = $this->url;
        $tipo = "<option></option>
        <option>Quadrada</option>
        <option>Oval</option>
        <option>Redonda</option>
        <option>Retangular</option>
        ";
        $acao = "criar";
        require "views/MesaForm.php";
    }

    public function editar($id)
    {
        $mesa = $this->mesaModel->getById($id);
        $id = $mesa["id"];


        $lista_de_lugares = ["2", "4", "6", "8"];
        $lugares = "<option></option>";
        foreach ($lista_de_lugares as $l) {
            $selected = $mesa["lugares"] == $l ? "selected" : "";
            $lugares .= "<option $selected>$l</option>";
        }

        $tipos = ["Quadrada", "Oval", "Redonda", "Retangular"];
        $tipo = "<option></option>";
        foreach ($tipos as $t) {
            $selecionado = $mesa["tipo"] == $t ? "selected" : "";
            $tipo .= "<option $selecionado>$t</option>";
        }

        # Quebra o texto usando a vírgula com separador e gera um array
        $arrayCaracteristicas = explode(",", $mesa["caracteristicas"]);

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/MesaForm.php";
    }

    public function atualizar()
    {
        $id = $_POST["id"];
        $lugares = $_POST["lugares"];
        $tipo = $_POST["tipo"];
        $acao = $_POST["acao"];
        
        $arrayCaracteristicas = [];             # Crio a array vazio
        if (isset($_POST["caracteristicas"])){  # Verifico se existe algum item marcado
            $arrayCaracteristicas = $_POST["caracteristicas"];

        }
        

        if ($acao == "editar") {
            $id = $_POST["id"];
            $resposta = $this->mesaModel->update($id, $lugares, $tipo, $arrayCaracteristicas);
        } else {
            $resposta = $this->mesaModel->insert($id, $lugares, $tipo, $arrayCaracteristicas);
        }

        if ($resposta["sucesso"] == true) { # Registro foi inserido

            header("location: " . $this->url . "/mesa-adm");
            exit(); # Ele vai garantir que nada seja executado após ele.

        } else { # Deu erro no model.
            $mensagem = $resposta["mensagem"];
            require "views/ErroView.php";
        }
    }
}