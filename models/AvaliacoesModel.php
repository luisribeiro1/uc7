<?php

require_once "DataBase.php";

class Avaliacoes
{
    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de meses
    public function getAllAvaliacoes(){
        // return $this->lista_cardapio;
        
        $sql = $this->db->query("SELECT * FROM avaliacoes");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}