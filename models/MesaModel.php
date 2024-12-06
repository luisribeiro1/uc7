<?php

# Incluir um arquivo com a conexão com o banco de dados
require_once "DataBase.php";
class Mesa 
{
    # Criar um atributo privado para receber a conexão com o banco
    private $db;

    # Método construtor da classe. Ele sera executado, quando a classe for instanciada. 
    public function __construct(){ 
        # Executa o método esatático para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de mesas
    public function  getAllMesas(){
        # Executa o código SQL no banco de dados através do método query
        # O método query é usado para consultas, ou seja, quando usar SELECT 
        $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");
        #retorna um array associativo com o resultado da consulta 
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id){
        # Obter dados da mesa
        $sql = $this->db->prepare("SELECT * FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        $mesa = $sql->fetch(PDO::FETCH_ASSOC);

        # Obter dados da tabela disponibilidade
        $sql = $this->db->prepare("SELECT * FROM disponibilidades WHERE numero_mesa = ?");
        $sql->execute([$id]);
        $disponibilidade = $sql->fetch(PDO::FETCH_ASSOC);

        $mesa["disponibilidade"] = $disponibilidade;
        return $mesa;
    }

    # Executar o SQL para remover o registro de uma mesa
    public function delete($id) {
        try{
            $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
            $sql->execute([$id]);  
            return [
                "sucesso" => true,
                "mensagem" => "Registro excluido"
            ];
        }
        catch(PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao excluir o registro" . $erro->getMessage()
            ];
        }

    }

    # Método para inserir os dados na tabela
    public function insert($id,$lugares,$tipo,$arrayCaracteristicas,$arrayPeriodos) {
        # Descontruir o array para uma string, separando cada item por virgula
        $caracteristicas = implode(",", $arrayCaracteristicas);

        try{
            # Iniciar uma trasação para garantir atomicidade.
            $this->db->beginTransaction(); 

            # Insere na tabela mesas
            $sql = $this->db->prepare("INSERT INTO mesas (id,lugares,tipo,caracteristicas) VALUES (?, ?, ?, ?)");
            $sql->execute([$id,$lugares,$tipo,$caracteristicas]);

            # Insere na tabela disponibilidade
            $sql = $this->db->prepare("INSERT INTO disponibilidades (numero_mesa, periodo) VALUES (?, ?)");
            foreach($arrayPeriodos as $periodo) {
                $sql->execute([$id,$periodo]);
            }
            
            # Confirma a transação
            $this->db->commit();

            return [
                "sucesso" => true,
                "mensagem" => "Registro inserido"
            ];
        }
        catch(PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro" . $erro->getMessage()
            ];
        }
    }

    public function update($id,$lugares,$tipo,$arrayCaracteristicas) {
        $caracteristicas = implode(",", $arrayCaracteristicas);
        try{
            $sql = $this->db->prepare("UPDATE mesas SET lugares=?,tipo=?,caracteristicas=? WHERE id=?");
            $sql->execute([$lugares,$tipo,$caracteristicas,$id]);

            # Apagar todos os registros de disponibilidade para a mesa atual
            $sql = $this->db->prepare("DELETE FROM disponibilidade WHERE numero_mesa=?");
            $sql->execute([$id]);

            $sql = $this->db->prepare("INSERT INTO disponibilidades (numero_mesa, periodo) VALUES (?, ?)");
            foreach($arrayPeriodos as $periodo) {
                $sql->execute([$id,$periodo]);
            }
                        
            $this->db->commit();
            return [
                "sucesso" => true,
                "mensagem" => "Registro inserido"
            ];
        }
        catch(PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro" . $erro->getMessage()
            ];
        }
    }
}
