<?php
require_once "DataBase.php";

class Avaliacoes

{


    # Criar um atributo privado
    private $db;

    # Método construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }
   





    public function getAllAvaliacoes(){
       // return $this->listaDeMesas;

       $sql = $this->db->query("SELECT * FROM avaliacoes");
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


}