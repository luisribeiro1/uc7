<?php

# Inclui o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Mesa{
    #Criar um array associativo com a relação das mesas
    // private $listaDeMesas = [
    //     ["id" => 1, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares"=> 6, "tipo" => "oval"],
    //     ["id" => 3, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 4, "lugares"=> 8, "tipo" => "retangular"],
    //     ["id" => 5, "lugares"=> 2, "tipo" => "redonda"],
    //     ["id" => 6, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 7, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 8, "lugares"=> 4, "tipo" => "quadrada"],
    //     ["id" => 9, "lugares"=>6, "tipo" => "canto alemão"],
    //     ["id" => 10, "lugares"=>6, "tipo" => "canto alemão"],
    //     ["id" => 11, "lugares"=>6, "tipo" => "canto alemão"],
    //     ["id" => 12, "lugares"=>6, "tipo" => "canto alemão"],
    // ];

    # Criar um atributo privado para receber a conexão com o banco
    private $db;

    # método construtor da classe. Ele será executado, quando a classe for instanciada
    public function __construct(){
        # Executa o método estático para estabelecer a conexão com o banco de dados
        // Método estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }

    

    # Criar o método para retornar a lista de mesas
    public function getAllMesas(){
        // return $this->listaDeMesas;

        # Executa o código SQL no banco de dados atravez do método query. O método query é usado para consulta, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");
        # Retorna um Array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        # Obter os dados da mesa
        $resultadoDaConsulta = $this->db->prepare("SELECT * FROM mesas WHERE id=?");
        $resultadoDaConsulta->execute([$id]);
        $mesas = $resultadoDaConsulta->fetch(PDO::FETCH_ASSOC);      # Cria um array
        
        # obter dados da tabela disponibilidade
        $resultadoDaConsulta = $this->db->prepare("SELECT periodo FROM disponibilidade WHERE numero_mesa=?");
        $resultadoDaConsulta->execute([$id]);
        $disponibilidade = $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);      # Cria um array
        
        # Adicionar os periodos de disponibilidade na ao array da mesa

        $mesas["disponibilidade"] = $disponibilidade;

        return $mesas;

    }

    # executar o SQL para remover o registro de uma mesa
    public function delete($id){
        try{
            $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
            $sql->execute([$id]);
            return [
                "sucesso" => true,
                "mensagem" => "Registro deletado com sucesso!"
            ];
        }
        catch(PDOException $erro){
            return [
                "sucesso" => false,
                "mensagem" => "Falha ao excluir registro: " . $erro->getMessage()
            ];
        }
    }

    public function insert($mesa,$lugares,$tipo,$arrayCaracteristicas,$arrayPeriodos){

        # Desconstruir o array para uma string,separando cada item por vírgula
        $caracteristicas = implode(",",$arrayCaracteristicas);
        

        try{

            # Iniciar uma transação para garantir atomicidade
            $this->db->beginTransaction();

            # insere na tabela mesa:
            $sql = $this->db->prepare(
                "INSERT INTO mesas (id,lugares,tipo,caracteristicas)
                VALUES (?,?,?,?)"
            );
            $sql->execute([$mesa,$lugares,$tipo,$caracteristicas]);

            # insere na tabela disponibilidade
            $sql = $this->db->prepare(
                "INSERT INTO disponibilidade (numero_mesa,periodo)
                VALUE (?,?)"
            );
            foreach($arrayPeriodos as $periodo){
                $sql->execute([$mesa,$periodo]);
            }

            # Confirmar a transaçãos
            $this->db->commit();

            return [
                "sucesso" => true,
                "mensagem" => "Registro inserido com sucesso"
            ];
        }
        catch(PDOException $erro){
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro: " . $erro->getMessage()
            ];
        }
    }

    public function update($id,$lugares,$tipo,$arrayCaracteristicas,$arrayPeriodos){

        # Desconstruir o array para uma string,separando cada item por vírgula
        $caracteristicas = implode(",",$arrayCaracteristicas);

        try{

            # Iniciar uma transação para garantir atomicidade
            $this->db->beginTransaction();

            $sql = $this->db->prepare(
                "UPDATE mesas SET lugares=?,tipo=?,caracteristicas=?
                    WHERE id=?"
            );
            $sql->execute([$lugares,$tipo,$caracteristicas,$id]);

            # Apagar todos os registro de disponibilidade para a mesa atual
            $sql = $this->db->prepare(
                "DELETE FROM disponibilidade 
                WHERE numero_mesa = ?"
            );
            $sql->execute([$id]);

            # insere na tabela disponibilidade
            $sql = $this->db->prepare(
                "INSERT INTO disponibilidade (numero_mesa,periodo)
                VALUE (?,?)"
            );
            foreach($arrayPeriodos as $periodo){
                $sql->execute([$id,$periodo]);
            }

            # Confirmar a transaçãos
            $this->db->commit();

            return [
                "sucesso" => true,
                "mensagem" => "Registro inserido com sucesso"
            ];

        }
        catch(PDOException $erro){
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao atualizar o registro: " . $erro->getMessage()
            ];
        }
    }
}