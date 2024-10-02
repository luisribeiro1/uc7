<?php
# Incluir o arquivo com a conexão com o banco de dados.
require_once "DataBase.php";

class Cardapio{
    # Criar um atributo privado para receber a conexão com o banco.
    private $db;

    # Método construtor da classe. Ele será executado, quando a classe for instanciada.
    public function __construct() {

         # Executa o método estático para estabelecer a conexão com o banco de dados.
        # Métodos estáticos é aquele que não precisa ser instanciado.
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de cardapio
    public function getAllCardapios(){

         # Executa o código SQL no banco de dados através do método query.
        # O método query é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM cardapio");

        # Retorna um array associativo com o resultado da consulta.
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    # Executar o SQL para remover o registro de uma mesa.
    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ?");
        return $sql->execute([$id]);

    }

    // Criar método para inserir os dados na tabela.
    public function insert($nome,$preco,$tipo,$descricao,$foto,$status){
        $sql = $this->db->prepare(
            "INSERT INTO cardapio (nome,preco,tipo,descricao,foto,status) 
            VALUES(?, ?, ?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$preco,$tipo,$descricao,$foto,$status]);
    }
}