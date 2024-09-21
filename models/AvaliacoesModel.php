<?php

require_once "DataBase.php";

class Avaliacoes
{
    private $db;

    public function __construct() {
        $this->db = DataBase::getconexao();
    }
 
    public function getAllavaliacoes() {
        $sql = $this->db->query("SELECT * FROM avaliacao");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}