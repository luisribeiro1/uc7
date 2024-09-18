<?php

# estabelece a conexão com o banco de dados
class DataBase 
{
  # atributo privado e estático
  private static $conexao = null;

  # método público e estático
  public static function getConexao() {

    if ( self::$conexao == null ) {
      $host = "localhost";
      $nomeDoBanco = "restaurante-mvc";
      $usuario = "root";
      $senha = "";

      try {
        self::$conexao = new PDO(   // crio a conexão
          "mysql:host=$host;dbname=$nomeDoBanco",
          $usuario,
          $senha
        );
        self::$conexao -> setAttribute( // como será tratado o erro caso houver
          PDO::ATTR_ERRMODE,
          PDO::ERRMODE_EXCEPTION
        );

      } catch (PDOException $erro) {  // classe do php que trata erros
        echo "Erro de conexão: " . $erro -> getMessage();
      }
    }
    return self::$conexao;
  }
}