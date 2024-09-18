<?php

# Estabalecer a conexão com o banco de dados

class DataBase{
    #atribuito privado e estatico
    private static $conexao = null;

    # método público e estatico
    public static function getConexao(){
        if (self ::$conexao == null){
            $host = "localhost";
            $nomeDoBanco = "restaurante-mvc";
            $usuario = "root";
            $senha = "";

            try{

             self::$conexao = new PDO(
                "mysql:host=$host;dbname=$nomeDoBanco",
                $usuario,
                $senha
             );
             self::$conexao->setAttribute(
               PDO::ATTR_ERRMODE,
               PDO::ERRMODE_EXCEPTION
             );

            }catch (PODException $erro) {
                echo "Erro de conexao: " . $erro->getMessage();
            }
        }
        return self::$conexao;
    }


}