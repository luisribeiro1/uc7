<?php 

# Inclue o arquivo model.
require_once "models/AvaliacoesModel.php";

class AvaliacoesController {

    # Criar a propriedade que receberá o endereço absoluto do site.
    # Esse endereço será usado pata compor rotas.
    # $url é uma propriedade pois está sendo criada no escopo da classe.
    private $url = "http://localhost/uc7/restaurante-mvc";

    private $avaliacoesModel;

    public function __construct(){
         # Instancia a classe Avaliacoes para obter dados do model.
         $this->avaliacoesModel = new Avaliacoes();
    }

    public function index(){

        

        # Cria um array que receberá a lista de mesas que o model retornará.
        $lista_de_avaliacoes = $this->avaliacoesModel->getAllAvaliacoes();

         # Recebe o valor da propriedade $url e fica disponivel para uso na view.
        $baseUrl = $this->url;

        # Importa a view que irá renderizar no template usando as variável e o array acima.
        # Lista_de_avaliacoes (array com dados) e $baseUrl com o endereço da aplicação.
        require "views/AvaliacoesView.php";
    }

    public function excluir($id){
        # Executa o método delete da classe de Model
        $this->avaliacoesModel->delete($id);

        # Redirecionar o usuário para a Listagem de avaliações.
        header("location: ".$this->url."/avaliacoes-adm");
    }

    public function aprovar($idAvaliacao){
        $this->avaliacoesModel->aprovar($idAvaliacao);

        header("location: ".$this->url. "/avaliacoes-adm");
    }
}