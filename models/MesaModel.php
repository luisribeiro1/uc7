<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Mesa
{
    # Criar um array associativo com a relação das mesas
    //  private $listaDeMesas = [
    //      ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //      ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //      ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //      ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //      ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //      ["id" => 8, "lugares" => 10, "tipo" => "redonda"],
    //  ];

    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe. Ele será executado quando a classe for instanciada
    public function __construct(){

        # Executa o método estático para estabelecer a conexão com o banco de dados
        # Metodo estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de meses
    public function getAllMesas(){
        // return $this->listaDeMesas;
        
        # Executa o código SQL no Banco de Dados através do método query
        # O método é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");

        # Retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        # Obter os dados da mesa
        $sql = $this->db->prepare("SELECT * FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        # Retorna um array associativo com o resultado da consulta
        $mesa = $sql->fetch(PDO::FETCH_ASSOC);      # Cria um array 
        
        # Obter os dados da tabela disponibilidade
        $sql = $this->db->prepare("SELECT periodo FROM disponibilidade WHERE numero_mesa = ?");
        $sql->execute([$id]);
        $disponibilidade = $sql->fetchAll(PDO::FETCH_ASSOC);      # Cria um array 

        # Adicionar os períodos de disponibilidade ao array da mesa
        $mesa["disponibilidade"] = $disponibilidade;

        return $mesa;


        }

    // Criar método para inserir os dados no card
    public function insert($id,$tipo,$lugares, $arrayCaracteristicas,$arrayPeriodos){

        # Desconstruir o array para uma string, separando cada item por virgula
        $caracteristicas = implode(",", $arrayCaracteristicas);
        try {

            # Iniciar a transação para garantir atomicidade
            $this->db->beginTransaction();

            # insere na tabela mesas
            $sql = $this->db->prepare(
                "INSERT INTO mesas (id,lugares,tipo, caracteristicas) VALUES(?, ?, ?,?)"
            );
            $sql->execute([$id, $lugares, $tipo, $caracteristicas]);

            # Insere na tabela disponibilidade

            $sql = $this->db->prepare(
                "INSERT INTO disponibilidade(numero_mesa, periodo) VALUES(?,?)"
            );
            foreach($arrayPeriodos as $periodo){
                
                $sql->execute([$id, $periodo]);
                //sql->debugDumpParams();   // Ajuda a debugar o que é mandado para  o banco (é necessário comentar o header do controller dentro do atualizar)
            }

            # Confirmar a transação
            $this->db->commit();

            return [
                "sucesso" => true,
                "mensagem" => "Registro inserido"
            ];
        } catch (PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro: " . $erro->getMessage()
            ];
        }
    }

    # Executar o SQL para remover o registro de uma mesa 
    public function delete($id){
        try {
            $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
            $sql->execute([$id]);
            return [
                "sucesso" => true,
                "mensagem" => "Exclusão Feita"
            ];
        } catch (PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Falha ao excluir: " . $erro->getMessage(),
                "codigo" => $erro->getCode()
            ];
        }
    }

    // Método para atualizar os dados da edição
    public function update($id,$tipo,$lugares, $arrayCaracteristicas, $arrayPeriodos){

        # Desconstruir o array para uma string, separando cada item por virgula
        $caracteristicas = implode(",", $arrayCaracteristicas);
        try {

             # Iniciar a transação para garantir atomicidade
             $this->db->beginTransaction();

            $sql = $this->db->prepare("UPDATE mesas SET lugares=?,tipo=?, caracteristicas=? WHERE id=?");
            $sql->execute([$lugares, $tipo, $caracteristicas, $id]);

            # Apagar todos os registros de disponibilidade para a mesa atual
            $sql = $this->db->prepare("DELETE FROM disponibilidade WHERE numero_mesa = ?");
            $sql->execute([$id]);
            
            # Insere na tabela disponibilidade
            $sql = $this->db->prepare(
                "INSERT INTO disponibilidade(numero_mesa, periodo) VALUES(?,?)"
            );
            foreach($arrayPeriodos as $periodo){
                
                $sql->execute([$id, $periodo]);
                //sql->debugDumpParams();   // Ajuda a debugar o que é mandado para  o banco (é necessário comentar o header do controller dentro do atualizar)
            }

            # Confirmar a transação
            $this->db->commit();

            return [
                "sucesso" => true,
                "mensagem" => "Registro Alterado"
            ];
        } catch (PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao atualizar o registro: " . $erro->getMessage()
            ];
        }
    
    }

}