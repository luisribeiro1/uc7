<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Avaliacoes
{
    # Criar um array associativo com a relação das mesas
    //  private $listaDeMesas = [
    //      ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //      ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //      ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //      ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //      ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //      ["id" => 8, "lugares" => 10, "tipo" => "redonda"],
    //  ];

    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de avaliacoes
    public function getAllAvaliacoes(){
        // return $this->listaDeMesas;
        
        # Executa o código SQL no Banco de Dados através do método query
        # O método é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta= $this->db->query("SELECT * FROM avaliacoes");
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aprovar($idAvaliacao){
        $sql = $this->db->prepare('UPDATE avaliaxoes SET situacao = ? WHERE idAvaliacoes = ?');
        return $sql->execute(['ok',$idAvaliacao]);
    }

    # Executar o SQL para remover a avaliação de um item 

    public function delete ($idAvaliacao){
        $sql = $this->db->prepare("DELETE FROM avaliacoes WHERE idAvaliacao = ? ");
        return $sql->execute([$idAvaliacao]);

    }
}