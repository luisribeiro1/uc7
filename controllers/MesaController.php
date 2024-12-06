<?php
require_once 'models/MesaModel.php';

class MesaController {

    private $mesaModel;
    public $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function __construct() {
        $this->mesaModel = new Mesa();
    }

    public function index() {
        $mesas = $this->mesaModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/MesaView.php';
    }

    public function show($id) {
        $mesa = $this->mesaModel->getById($id);
        require 'views/mesas/show.php';
    }

    public function criar() {
        $baseUrl = $this->baseUrl;
        $acao = "criar";
        $id = "";
        $lugares = "";
        $tipo = "";
        
        // Definição correta das opções de tipo e lugares
        $tipo = "<option></option>
        <option>redonda</option>
        <option>quadrada</option>
        <option>retangular</option>
        <option>oval</option>";
        
        $lugares = "<option></option>
        <option>2</option>
        <option>4</option>
        <option>6</option>
        <option>8</option>";
        
        $arrayCaracteristicas = [];
        $arrayPeriodos = [];
        
        require 'views/MesaForm.php';
    }

    public function store() {
        $id = $_POST['id'];
        $capacidade = $_POST['capacidade'];
        $tipo = $_POST['tipo'];
        $this->mesaModel->insert($id, $capacidade, $tipo);
        header('Location: /mesa/index');
    }

    public function editar($id) {
        $mesa = $this->mesaModel->getById($id);
        $id = $mesa["id"];
        $lugares = $mesa["lugares"];
        $tipo = $mesa["tipo"];
        $baseUrl = $this->baseUrl;
        $acao = "editar";

        // echo <"pre">;
        // var_dump($mesa);
        // echo <"/pre">;

        // Lista de lugares
        $lista_de_lugares = ["2", "4", "6", "8"];
        $lugaresOptions = "<option></option>";
        foreach ($lista_de_lugares as $t) {
            $selected = $mesa["lugares"] == $t ? "selected" : "";
            $lugaresOptions .= "<option $selected>$t</option>";

        }
        # Quebra o texto usando a virgula com separador e gera um array
        $arrayCaracteristicas = explode(",",$mesa["caracteristicas"]);

        # Cria  o array que recebe 
        $arrayPeriodos = $mesa ["disponibilidade"];

        require 'views/MesaForm.php';
    }

    public function atualizar($id = null) {
        $id = $_POST['id'];
        $lugares = $_POST['lugares'];
        $tipo = $_POST['tipo'];
        $acao = $_POST['acao'];

        $arrayCaracteristicas = [];                               # Cria o array vazio
        if (isset ($_POST["caracteristicas"])){                   # verifica se existe algum item marcado  
            $arrayCaracteristicas = $_POST["caracteristicas"];
        }
        $arrayPeriodos = [];                                      # Cria o array vazio
        if (isset ($_POST["disponibilidade"])){                   # verifica se existe algum item marcado  
            $arrayPeriodos = $_POST["disponibilidade"];
        }

        if ($acao == "editar") {
            $resposta = $this->mesaModel->update($id, $lugares, $tipo, $arrayCaracteristicas,$arrayPeriodos);
        } else {
            $resposta = $this->mesaModel->insert($id, $lugares, $tipo,$arrayCaracteristicas,$arrayPeriodos);
        }

        if ($resposta["sucesso"] == true) {
            header("Location: " . $this->baseUrl . "/mesa-adm");
            exit();  // Garantir que nada seja executado após o redirecionamento
        } else {
            $mensagem = $resposta["mensagem"];
            require "view/ErroViews.php";
        }
    }

    public function excluir($id) {
        $this->mesaModel->delete($id);
        header("Location: " . $this->baseUrl . "/mesa-adm");
    }   
}
