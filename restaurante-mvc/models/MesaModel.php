<?php

// incluir o arquivo com a conexeção com o banco de dados 
require_once "DataBase.php";

class Mesa

{

# Criar um array associativa com a relaçaõ das mesas
    //  private $listaDeMesas = [
    //      ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //     ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //      ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //      ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //  ];

    # Criar um atributo privado
    private $db;

    # Método construtor da classe. ele sera executado, quando a classe for instanciada.
    public function __construct(){

        // executa o método estatico para estabelecer a conexão com o banco de dados
        // método estatico é aquele que não precisa ser instalado
        $this->db = DataBase::getConexao();
    }
   





    public function getAllMesas(){
       // return $this->listaDeMesas;

       // execute o codigo SQL no banco de dados atraves do metodo query
       // o metodo query é usado para consultar, ou seja, quando usar SELECT
       $resultadoDaConsulta = $this->db->query("SELECT * FROM mesas");

       // retorna um array associativo com o resultado da consulta
       return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id){
        # Obter os dados da mesa 
        $sql = $this->db->prepare("SELECT * FROM mesas WHERE id = ?");
        $sql->execute([$id]);
        $mesa = $sql->fetch(PDO::FETCH_ASSOC); # criar um array

        # obter os dados da tabela disponibilidade
        $sql = $this->db->prepare("SELECT periodo FROM disponibilidade WHERE numero_mesa = ?");
        $sql->execute([$id]);
        $disponibilidade = $sql->fetchAll(PDO::FETCH_ASSOC);

        # Adicionar os periodos de disponibilidade ao array da mesa
        $mesa["disponibilidade"] = $disponibilidade;

        return $mesa;
     }

    // executar o SQL para remover o registro de uma mesa
    public function delete($id) {
        try{
        $sql = $this->db->prepare("DELETE FROM mesas WHERE id = ?");
         $sql->execute([$id]);
         return [
            "sucesso" => true,
            "mensagem" => "Registro foi apagado"
           ];

    }
    catch(PDOException $erro){
        return [
         "sucesso" => false,
         "mensagem" => "erro ao deletar:" . $erro->getMessage()
        ];
     }

    }

    public function insert($id,$lugares,$tipo,$arrayCaracteristicas,$arrayPeriodos){

        $caracteristicas = implode(",", $arrayCaracteristicas);
        try{

            # iniciar as transação para garantir atomicidade
            $this->db->beginTransaction();
            # insere na tabela mesas
         $sql = $this->db->prepare(
            "INSERT INTO mesas (id,lugares,tipo,caracteristicas)
            VALUES (?,?,?,?)"
            );
             $sql->execute([$id,$lugares,$tipo,$caracteristicas]);

            # insere na tabela disbonibilidade
            $sql = $this->db->prepare("INSERT INTO disponibilidade (numero_mesa, periodo) VALUES (?,?)"
        );
            foreach($arrayPeriodos as $periodo){
                $sql->execute([$id,$periodo]);
            }

            # confirmar a transação
            $this->db->commit();

             return [
                "sucesso" => true,
                "mensagem" => "Registro inserido"
               ];
        }
        catch(PDOException $erro){
           return [
            "sucesso" => false,
            "mensagem" => "erro ao inserir o registro" . $erro->getMessage()
           ];
        }
    
    }

public function update($id,$lugares,$tipo,$arrayCaracteristicas){

    $caracteristicas = implode(",", $arrayCaracteristicas);

    try{

        $this->db->beginTransaction();
    
    $sql = $this->db->prepare("UPDATE mesas SET lugares=?,tipo=?,caracteristicas=?
    WHERE id=?"
    );
     $sql->execute([$lugares,$tipo,$caracteristicas,$id]);

       # insere na tabela disbonibilidade
       $sql = $this->db->prepare("DELETE FROM disponibilidade WHERE numero_mesa = ?");
      $sql->execute([$id]);

      $sql = $this->db->prepare("INSERT INTO disponibilidade (numero_mesa, periodo) VALUES (?,?)"
    );
        foreach($arrayPeriodos as $periodo){
            $sql->execute([$id,$periodo]);
        }
        # confirmar a transação
        $this->db->commit();

     return [
       "sucesso" => true,
       "mensagem" => "Registro alterado"
     ];
    
  }
  catch (PDOException $erro){
    return [
        "sucesso" => false,
        "mensagem" => "erro ao atualizar o registro" . $erro->getMessage()
       ];
  }

}
}

