<?php

require_once "DataBase.php";


class Cardapio{

    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }


    public function getAllCardapio(){
        //return $this->listaDeMesas;

        $sql = $this->db->query("SELECT * FROM cardapio");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }





}


