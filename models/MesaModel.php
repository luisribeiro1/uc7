<?php
require_once 'Database.php';

class Mesa
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll()
    {
        $sql = $this->db->query('SELECT * FROM mesas');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        # Obter os dados da Mesa
        $sql = $this->db->prepare('SELECT * FROM mesas WHERE id = ?');
        $sql->execute([$id]);
        $mesa = $sql->fetch(PDO::FETCH_ASSOC);       # Cria um array 
        # Obter os dados da tabela disponibilidade


        $sql = $this->db->prepare('SELECT periodo FROM disponibilidade WHERE numero_mesa = ?');
        $sql->execute([$id]);
        $disponibiledade = $sql->fetchALL(PDO::FETCH_ASSOC);       # Cria um array 

        # Adicionar os periodos de disponibiledade ao array da mesa
        $mesa["disponibilidade"] = $disponibiledade;

        //var_dump($mesa);
        return $mesa;

    }

    public function insert($id, $lugares, $tipo, $arrayCaracteristicas, $arrayPeriodos)
    {

        # destruir o array para uma string, separando cada item por virgula
        $caracteristicas = implode(",", $arrayCaracteristicas);
        try {
            $sql = $this->db->prepare('INSERT INTO mesas (id, lugares, tipo, caracteristicas ) VALUES (?, ?,?,?)');
            $sql->execute([$id, $lugares, $tipo, $caracteristicas]);

            # Insere na tabela disponibilidade
            $sql = $this->db->prepare("INSERT INTO disponibilidade (numero_mesa, periodo) VALUES (?,?)");
            foreach ($arrayPeriodos as $periodo) {
                $sql->execute([$id, $periodo]);
            }

            # confirma a transacao
            $this->db->commit();

            return [
                "sucesso" => true,
                "mensagem" => "Registro inserido"
            ];

        } catch (PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao inserir o registro:" . $erro->getMessage(),
                // "codigo"=>$erro->getCode()

            ];
        }
    }


    public function update($id, $lugares, $tipo, $arrayCaracteristicas, $arrayPeriodos)
    {
        $caracteristicas = implode(",", $arrayCaracteristicas);
        try {

            # Iniciar na transacao para garantir atomicidade
            $this->db->beginTransaction();

            $sql = $this->db->prepare('UPDATE mesas SET lugares = ?, tipo = ? ,caracteristicas = ? WHERE id = ?');
            $sql->execute([$lugares, $tipo, $caracteristicas, $id]);
            $sql->debugDumpParams();

            # Apaga todos os registros de disponibilidade para a mesa atual
            $sql = $this->db->prepare("DELETE FROM disponibilidade WHERE numero_mesa = ?");
            $sql->execute([$id]);

            # Insere na tabela disponibilidade
            $sql = $this->db->prepare("INSERT INTO disponibilidade (numero_mesa, periodo) VALUES (?,?)");
            foreach ($arrayPeriodos as $periodo) {
                $sql->execute([$id, $periodo]);
            }

            # confirma a transacao
            $this->db->commit();


            //$sql->debugDumpParams();
            return [
                "sucesso" => true,
                "mensagem" => "Registro alterado"
            ];
        } catch (PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao atualizar o registro:" . $erro->getMessage(),
                // "codigo"=>$erro->getCode()
            ];
        }
    }

    public function delete($id)
    {
        try {
            $sql = $this->db->prepare('DELETE FROM mesas WHERE id = ?');
            $sql->execute([$id]);
            return [
                "sucesso" => true,
                "mensagem" => "Registro deletado"
            ];
        } catch (PDOException $erro) {
            return [
                "sucesso" => false,
                "mensagem" => "Erro ao deletar o registro:" . $erro->getMessage(),
                // "codigo"=>$erro->getCode()

            ];
        }
    }
}
