<?php

# Inclue o arquivo model
require_once "models/AvaliacoesModel.php";

class AvaliacoesController
{
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";
   
    private $avaliacoesModel;

    public function __construct(){
        $this->avaliacoesModel = new Avaliacoes();
    }

    public function index(){
       
        $lista_de_avaliacoes = $this->avaliacoesModel->getAllAvaliacoes();
        $baseUrl = $this->baseUrl;
        require "views/AvaliacoesView.php";
    }

    public function atualizar($idCardapio){

        # Recuperar os valores dos campos do formulario
        $nota = $_POST["nota"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $comentario = $_POST["comentario"];
        $data = date("Y-m-d");
        $situacao = "novo";

        $this->avaliacoesModel->insert($nota, $comentario, $idCardapio, $data, $nome, $email);
        header("location: ".$this->baseUrl."/avaliacoes/listar/$idCardapio");
       

    }

    public function listar($idCardapio){
       require_once "models/CardapioModel.php";
       $cardapioModel = new Cardapio();
        $cardapioUnico = $cardapioModel->getbyId($idCardapio);

        $listaDeAvaliacoes = $this->avaliacoesModel->getByIdCardapio($idCardapio);

        $baseUrl = $this->baseUrl;
        require "views/AvaliacoesSiteView.php";
      
    }

    public function excluir($id){
        $this->avaliacoesModel->delete($id);
        header("location:".$this->baseUrl."/avaliacoes-adm");
    }

    public function aprovar($id){
        $this->avaliacoesModel->aprovar($id);
        header("location:".$this->baseUrl."/avaliacoes-adm");
    }
}