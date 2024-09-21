<?php

require "DataBase.php";

class Avaliacoes {

    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getAllAvaliacao(){
        $sql = $this->db->query('SELECT * FROM avaliacoes');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}