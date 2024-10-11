<?php
# Incluir o arquivo com a conexão com o banco de dados.
require_once "DataBase.php";

class Avaliacoes{
    # Criar um atributo privado para receber a conexão com o banco.
    private $db;

    # Método construtor da classe. Ele será executado, quando a classe for instanciada.
    public function __construct() {

         # Executa o método estático para estabelecer a conexão com o banco de dados.
        # Métodos estáticos é aquele que não precisa ser instanciado.
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de avaliacoes
    public function getAllAvaliacoes(){

        # Executa o código SQL no banco de dados através do método query.
        # O método query é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM avaliacoes");

        # Retorna um array associativo com o resultado da consulta.
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM avaliacoes WHERE idAvaliacao = ?");
        return $sql->execute([$id]);

    }

    public function aprovar($idAvaliacao){
        $sql = $this->db->prepare("UPDATE avaliacoes SET situacao=? WHERE idAvaliacao=?");
        return $sql->execute(['Ok', $idAvaliacao]);
    }
}