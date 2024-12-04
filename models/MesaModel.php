<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";
class Mesa
{
    # Criar um atributo privado para receber a conexão com o banco
    private $db;

    # Método construtor da classe. Ele será executado, quando a classe for instanciada
    public function __construct(){
        # Executa o método estatico para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instanciado (new)
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de mesas 
    public function getAllMesas(){
        // return $this->listaDeMesas;
        
        # Executa o código SQL no banco de dados através do método query
        # o método query é usado para consultas ou seja quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");
        
        # retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }


    # executar o SQL para remover um registro de uma mesa
    public function delete($id){
        try{
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        return [
            "sucesso" => true,
            "mensagem" => "Exluído com sucesso"
        ];
        }catch(PDOException $erro){
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro: " . $erro->getMessage()
            ];
        }
    }

    public function insert($id, $lugares, $tipo, $arrayCaracteristicas){
        
        # descontruir o array para uma string, separando cada item por vírgula 
        $caracteristicas = implode(",", $arrayCaracteristicas);

        try{
            $sql = $this->db->prepare("INSERT INTO mesas (id, lugares, tipo, caracteristicas) VALUES (?, ?, ?, ?); ");
            $sql->execute([$id, $lugares, $tipo, $caracteristicas]);
            return [
                "sucesso" => true,
                "mensagem" => "Registro conclúido"
            ];            
        }catch(PDOException $erro){
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro: " . $erro->getMessage()
            ];
        }
    }

    public function update($id, $lugares, $tipo, $arrayCaracteristicas){

         # descontruir o array para uma string, separando cada item por vírgula 
         $caracteristicas = implode(",", $arrayCaracteristicas);

       try{
           $sql = $this->db->prepare("UPDATE mesas SET lugares=?, tipo=?, caracteristicas=? WHERE id = ?");
           $sql->execute([$lugares, $tipo, $caracteristicas, $id]);
            return [
                "sucesso" => true,
                "mensagem" => "Registro atualizado"
            ];
       }catch(PDOException $erro){
            return [
            "sucesso" => false,
            "mensagem" => "Erro ao atualizar o registro: " . $erro->getMessage()
            ];
        }
    }
}