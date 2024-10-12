<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Login
{

  # criar um atributo privado para receber a conexão com o banco de dados
  private $db;

  # método construtor da classe. Ele será executado, quando a classe for instanciada.
  public function __construct()
  {
    # executa o método estático para estabelecer a conexão com o banco de dados
    # método estático é aquele que não precisa ser instanciado
    $this->db = DataBase::getConexao();
  }

  # métodod para retornar um ÚNICO item de mesas
  public function getByUsuarioESenha($usuario, $senhaDoUsario) {
    $sql = $this -> db -> prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $sql -> execute([$usuario]);
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    # Se encontrou o usuário
    if($resultado){
      echo "1";
      $senhaDoBanco = $resultado['senha'];
      
      # Verifica se as senhas são iguais aos olhos do algorítmo de criptografia
      if(password_verify($senhaDoUsario, $senhaDoBanco)) {
        $_SESSION["nome_usuario"] = $resultado["nome"];
        echo "2";
        return true;
      }
    }
    
    $_SESSION["erro"] = "Falha no login";
    echo "3";
    return false;
  }

  public function insert($nome, $usuario, $senha) {
    
    # Criptografar a senha
    # Criptografia: é mão dupla / Hash: é mão única
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    $sql = $this -> db -> prepare('INSERT INTO usuarios (nome, usuario, senha) VALUES (?, ?, ?)');
    return $sql -> execute([$nome, $usuario, $senhaCriptografada]);
  }
}