<?php 

# Estabelecera conexão com o banco de dados

class DataBase {
    # atributo privado e estático
    private static $conexao = null;

    # Método Publico e Estático
    public static function getConexao(){
        
        # Testa se a conexao ja existe para evitar uma nova conexão
        if (self::$conexao == null){
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

            }catch(PDOException $erro) {
                echo "Erro de conexão: " . $erro->getMesssage();
            }
        }

        
        return self::$conexao;
    }
    
}