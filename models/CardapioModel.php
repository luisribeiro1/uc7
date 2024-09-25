<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Cardapio
{
    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe. Ele será executado quando a classe for instanciada
    public function __construct(){

                # Executa o método estático para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instaciado
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de meses
    public function getAllCardapio(){
        // return $this->lista_cardapio;
        
        $resultadoDaConsulta = $this->db->query("SELECT * FROM cardapio");
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

}