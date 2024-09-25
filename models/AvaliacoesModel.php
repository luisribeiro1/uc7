<?php

# Incluir o arquivo com conexão com o banco de dados.
require_once "DataBase.php";

class Avaliacoes
{
    # Criar um atributo privado para receber a conexão com o banco.
    private $db;

    # Método construtor da classe, ele será executado sempre quando a classe for instânciada.
    public function __construct() {
        # Executa o método estático para estabelecer a conexão com o banco de dados.
        # Método estático é aquele que não precisa ser instanciado.
        $this->db = DataBase::getconexao();
    }

    # Criar o método para retornar a lista de avaliações.
    # O método query é usado para consultas, ou seja, quando usar SELECT.
    public function getAllavaliacoes() {
        $sql = $this->db->query("SELECT * FROM avaliacao");

        # Retorna um array associativo mostrando o resultado da pequisa.
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}