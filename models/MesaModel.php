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
        # Obter os dados da mesa 
        $sql = $this->db->prepare("SELECT * FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        $mesa =  $sql->fetch(PDO::FETCH_ASSOC); 

        # Obter os dados da tabela disponibilidade 
        $sql = $this->db->prepare("SELECT periodo FROM disponibilidade WHERE numero_mesa = ?");
        $sql->execute([$id]);
        $disponibilidade =  $sql->fetchAll(PDO::FETCH_ASSOC); # cria um array

        # adiconar os períodos de disponibilidade ao array da mesa
        $mesa["disponibilidade"] = $disponibilidade;
        
        return $mesa;

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

    public function insert($id, $lugares, $tipo, $arrayCaracteristicas, $arrayPeriodo){
        
        # descontruir o array para uma string, separando cada item por vírgula 
        $caracteristicas = implode(",", $arrayCaracteristicas);
        
        try{

            # iniciar uma transação para garantir atomicidade
            $this->db->beginTransaction();

            # insere na tabela mesas
            $sql = $this->db->prepare("INSERT INTO mesas (id, lugares, tipo, caracteristicas) VALUES (?, ?, ?, ?); ");
            $sql->execute([$id, $lugares, $tipo, $caracteristicas]);
            
            #insere na tabela disponibilidade
            $sql = $this->db->prepare("INSERT INTO disponibilidade (numero_mesa, periodo) VALUES (?, ?)");
            

            foreach($arrayPeriodo as $periodo){
                $sql->execute([$id, $periodo]);
                $sql->debugDumpParams();
            }
            
            # confirmar a transação 
            $this->db->commit();

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

    public function update($id, $lugares, $tipo, $arrayCaracteristicas, $arrayPeriodo){

        # descontruir o array para uma string, separando cada item por vírgula 
        $caracteristicas = implode(",", $arrayCaracteristicas);
        
        try{

           $this->db->beginTransaction();

           $sql = $this->db->prepare("UPDATE mesas SET lugares=?, tipo=?, caracteristicas=? WHERE id = ?");
           $sql->execute([$lugares, $tipo, $caracteristicas, $id]);
           
           # apagar todos os registros de disponibilidade para a mesa atual
           $sql = $this->db->prepare("DELETE FROM disponibilidade WHERE numero_mesa = ?");
           $sql->execute([$id]);
           
           $sql = $this->db->prepare("INSERT INTO disponibilidade (numero_mesa, periodo) VALUES (?, ?)");
            
           foreach($arrayPeriodo as $periodo){
               $sql->execute([$id, $periodo]);
               $sql->debugDumpParams();
           }
           
           # confirmar a transação 
           $this->db->commit();

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