<?php

require_once "models/AvaliacoesModel.php";


class AvaliacoesController 
{
    private $url = "http://localhost/uc7/restaurante-mvc";
    private $avaliacoesModel;
    
    public function __construct(){
        
        $this->avaliacoesModel = new Avaliacoes();
        # instancia a classe Mesa para obter os dados do model
        }
        


public function index()
{



$lista_de_avaliacoes = $this->avaliacoesModel->getAllAvaliacoes();
$baseUrl = $this->url;


require "views/AvaliacoesView.php";

}
public function excluir($id){
    $this->avaliacoesModel->delete($id);


    # redirecionar o usuario para a listagem de mesas 
    header("location: ".$this->url."/avaliacoes-adm");
}



}