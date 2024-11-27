<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Avaliacoes
{
    
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

    public function getByIdCardapio($idCardapio){
        // $sql = $this->db->prepare("SELECT * FROM avaliacoes WHERE idCardapio = ? and situacao='ok'");
        $sql = $this->db->prepare("SELECT * FROM avaliacoes WHERE idCardapio = ? ");
        $sql->execute([$idCardapio]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($idAvaliacao){
        $sql = $this->db->prepare('SELECT * FROM avaliacoes WHERE idAvaliacao = ?');
        $sql->execute([$idAvaliacao]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

     // Criar método para inserir os dados na tabela
     public function insert($nota,$comentario,$data,$nome,$email,$idCardapio){
        $sql = $this->db->prepare(
            "INSERT INTO avaliacoes (nota,comentario,data,nome,email,idCardapio,situacao)
            VALUES(?,?,?,?,?,?,?)");
            return $sql->execute([$nota,$comentario,$data,$nome,$email,$idCardapio,'novo']);
    }

    # Executa o SQL para aprovar a avaliação de um item
    public function aprovar ($idAvaliacao){
        $sql = $this->db->prepare('UPDATE avaliacoes SET situacao = ? WHERE idAvaliacao = ?');
        return $sql->execute(['ok',$idAvaliacao]);
    }

    # Executar o SQL para remover a avaliação de um item 
    public function delete ($idAvaliacao){
        $sql = $this->db->prepare("DELETE FROM avaliacoes WHERE idAvaliacao = ? ");
        return $sql->execute([$idAvaliacao]);
    }
    
    
}