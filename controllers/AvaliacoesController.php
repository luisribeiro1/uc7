<?php
require_once 'models/AvaliacoesModel.php';

class AvaliacoesController {

    private $avaliacoesModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    public function __construct() {
        $this->avaliacoesModel = new Avaliacoes();
    }

    public function index() {
        $avaliacoes = $this->avaliacoesModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/AvaliacoesView.php';
    }

    public function listar($idCardapio) {

        # Pegar os dados do cardápio
        require_once "models/CardapioModel.php";    # importar o model de cardápio
        $cardapioModel = new Cardapio();            # instanciar a classe Cardapio
        $cardapioUnico = $cardapioModel->getById($idCardapio);

        # Pegar os dados da avaliação do cardápio
        $listaDeAvaliacoes = $this->avaliacoesModel->getByIdCardapio($idCardapio);

        $baseUrl = $this->baseUrl;
        require 'views/AvaliacoesSiteView.php';
        //echo json_encode($listaDeAvaliacoes);
    }

    public function atualizar($idCardapio){

        # Recuperar os valores dos campos do formulário
        $nota = $_POST["nota"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $comentario = $_POST["comentario"];
        $data = date("Y-m-d");          # pega a data do sistema no formato ano-mes-dia
        $situacao = "novo";

        $this->avaliacoesModel->insert($nota, $comentario, $idCardapio,$data,$nome,$email);
        
        # redirecionar para a página de origem
        header("location: ".$this->baseUrl."/avaliacoes/listar/$idCardapio");
    }


    public function ver() {
        $avaliacoes = $this->avaliacoesModel->getAll();
        $baseUrl = $this->baseUrl;
        require 'views/AvaliacoesSiteView.php';
    }

    public function aprovar($idAvaliacao) {
        $this->avaliacoesModel->aprovar($idAvaliacao);
        header("location: ".$this->baseUrl."/avaliacoes");
    }

    public function excluir($idAvaliacao) {
        $this->avaliacoesModel->delete($idAvaliacao);
        header("location: ".$this->baseUrl."/avaliacoes");
    }
}
