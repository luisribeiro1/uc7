<?php
# Estabelecer a conexão com o banco de Dados

class DataBase{
    # Atributo privado e estatico
    private static $conexao = null;

    # metodo publico e estatico
    public static function getConexao(){
           
        # Testa se a conexão ja existe para evitar uma nova conexão
        if(self::$conexao == null){
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
           
             

            }  catch(PDOException $erro){
                echo "Erro de conexao: " . $erro->getMessage();
            }
        }
        return self::$conexao;
    } 
}