<?php

# Incluir o arquivo com conexão com o banco de dados.
require_once "DataBase.php";

class Mesa
{

    # Criar um array associativo com a relação das mesas 
    // private $listaDeMesas = [
    //     ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares" => 2, "tipo" => "oval"],
    //     ["id" => 3, "lugares" => 6, "tipo" => "redonda"],
    //     ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //     ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //     ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //     ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //     ["id" => 8, "lugares" => 2, "tipo" => "redonda"],
    // ];

    # Criar um atributo privado para receber a conexão com o banco.
    private $db;

    # Método construtor da classe, ele será executado sempre quando a classe for instânciada.
    public function __construct() {

        # Executa o método estático para estabelecer a conexão com o banco de dados.
        # Método estático é aquele que não precisa ser instanciado.
        $this->db = DataBase::getconexao();
    }


    # Criar o método para retornar a lista de mesas.
    # O método query é usado para consultas, ou seja, quando usar SELECT.
    public function getAllmesas() {
        // return $this->listaDeMesas;

        # Retorna um array associativo mostrando o resultado da pequisa.
        $sql = $this->db->query("SELECT * FROM mesas");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    # Executa o SQL para remover o registro de uma mesa.
    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?;# DELETE from clientes");
        $sql->execute([$id]);
    }
}