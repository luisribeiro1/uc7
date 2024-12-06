<?php
require_once 'models/CardapioModel.php';

class CardapioController {

    private $cardapioModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function __construct() {
        $this->cardapioModel = new Cardapio();
    }

    public function index() {
        $cardapio = $this->cardapioModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/CardapioView.php';
    }

    public function ver_cardapio() {
        $cardapio = $this->cardapioModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/CardapioSiteView.php';
    }

    public function ver() {
        $cardapio = $this->cardapioModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/CardapioSiteView.php';
    }

    public function criar() {
        $acao = "criar";
        $idCardapio = "";
        $nome = "";
        $preco = 0;
        $descricao = "";
        $foto = "";
        $status = "";
        $tipo = "<option></option>
                 <option>quadrada</option>
                 <option>retangular</option>
                 <option>oval</option>
                 <option>redonda</option>";
        $baseUrl = $this->baseUrl;
        require 'views/CardapioForm.php';
    }



    public function editar($idCardapio) {
        $cardapio = $this->cardapioModel->getById($idCardapio);
        $nome = $cardapio["nome"];
        $preco = $cardapio["preco"];
        
        $descricao = $cardapio["descricao"];
        $foto = $cardapio["foto"];

        $status = $cardapio["status"]==true ? "checked" : "";

        $tipos = ["quadrada", "retangular", "oval", "redonda"];
        $tipo = "<option></option>";
        foreach ($tipos as $t) {
            $selected = $cardapio["tipo"] == $t ? "selected" : "";
            $tipo .= "<option $selected>$t</option>";
        }

        $baseUrl = $this->baseUrl;
        $acao = "editar";
        require 'views/CardapioForm.php';
    }

    public function atualizar($idCardapio = null) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $foto = $_POST['foto'];

        $status = isset($_POST['status']) ? true : false;
        
        $acao = $_POST['acao'];

        if($acao=="editar"){
            $this->cardapioModel->update($idCardapio, $nome, $preco, $tipo, $descricao, $foto, $status);
        }else{
            $this->cardapioModel->insert($nome, $preco, $tipo, $descricao, $foto, $status);
        }
        
        header("Location: ".$this->baseUrl."/cardapio-adm");
    }

    public function excluir($idCardapio) {
        $this->cardapioModel->delete($idCardapio);
        header("Location: ".$this->baseUrl."/cardapio-adm");
    }
}
