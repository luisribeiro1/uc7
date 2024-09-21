<?php
require_once "DataBase.php";

class Avaliacoes{
    private $db;

    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function getAllAvaliacoes(){
        $sql = $this->db->query("SELECT * FROM avaliacoes");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}