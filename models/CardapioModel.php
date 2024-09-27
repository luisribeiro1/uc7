<?php

require_once "DataBase.php";

class Cardapio{

# Criar um atributo privado para receber a conexão com o banco
private $db;

# Método construtor da classe. Ele será executado, quando a classe for instanciada
public function __construct(){
    # Executa o método estatico para estabelecer a conexão com o banco de dados
    # Método estático é aquele que não precisa ser instanciado (new)
    $this->db = DataBase::getConexao();
}
# Criar o método para retornar a lista de mesas 
    public function getAllCardapio(){
        # Executa o código SQL no banco de dados através do método query
        # o método query é usado para consultas ou seja quando usar SELECT 
        $sql = $this->db->query("SELECT * FROM cardapio");
        # retorna um array associativo com o resultado da consulta
        return $sql->fetchAll(PDO::FETCH_ASSOC);
}
    
public function delete($id){
    $sql = $this->db->prepare("DELETE FROM cardapio WHERE idCardapio = ?");
    return $sql->execute([$id]);
}
}

