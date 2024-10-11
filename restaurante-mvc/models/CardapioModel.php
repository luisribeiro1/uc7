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

    public function getByid($idCardapio){
        $sql =$this->db->prepare("SELECT * FROM cardapio WHERE idCardapio = ?");
        $sql->execute([$idCardapio]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ?");
        return $sql->execute([$id]);
    }


    // metodo para inserir os dados na tabela
    public function  insert($nome,$preco,$tipo,$descricao,$foto,$status){
        $sql = $this->db->prepare(
            "INSERT INTO cardapio (nome,preco,tipo,descricao,foto,status)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
       return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status]);
    }

    public function update($id ,$nome, $preco, $tipo, $descricao, $foto, $status){
        $sql = $this->db->prepare("UPDATE cardapio SET nome=?, preco=?, tipo=?, descricao=?, foto=?, status=? WHERE idCardapio=?");
        return $sql->execute([$nome, $preco, $tipo, $descricao, $foto,$status,$id]);
    }



    



}


