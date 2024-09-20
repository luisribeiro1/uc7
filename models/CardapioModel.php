<?php

require_once "DataBase.php";

class Cardapio
{
    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de meses
    public function getAllCardapio(){
        // return $this->lista_cardapio;
        
        $sql = $this->db->query("SELECT * FROM cardapio");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}