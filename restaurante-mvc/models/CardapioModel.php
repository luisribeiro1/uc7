<?php

require_once "DataBase.php";

class Cardapio

{



    # Criar um atributo privado
    private $db;

    # Método construtor da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }
   





    public function getAllMesas(){
       // return $this->listaDeMesas;

       $sql = $this->db->query("SELECT * FROM cardapio");
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


}

