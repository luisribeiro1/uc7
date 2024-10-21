<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";

class Login
{

  # criar um atributo privado para receber a conexão com o banco de dados
  private $db;

  # método construtor da classe. Ele será executado, quando a classe for instanciada.
  public function __construct() {
    # executa o método estático para estabelecer a conexão com o banco de dados
    # método estático é aquele que não precisa ser instanciado
    $this->db = DataBase::getConexao();
  }

  public function getByUsuarioESenha($usuario, $senhaDoUsuario, $manter_logado) {
    $sql = $this -> db -> prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $sql -> execute([$usuario]);
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    # Se encontrou o usuário
    if($resultado){
      
      $senhaDoBanco = $resultado['senha'];
      
      # Verifica se as senhas são iguais aos olhos do algorítmo de criptografia
      if (password_verify($senhaDoUsuario, $senhaDoBanco)) {
        $_SESSION["nome_usuario"] = $resultado["nome"];
        $_SESSION["nivel_acesso"] = $resultado["nivelAcesso"];
        if ($manter_logado) {
          // cria o cookie
          setcookie('usuario', $resultado['nome'], time() + 86400, "/");
          // nome do cookie, valor, tempo de expiração (segundos), escopo global "/"
          setcookie('nivelAcesso', $resultado['nivelAcesso'], time() + 86400, "/");
        }

        return true;
      }
    }
    
    $_SESSION["erro"] = "Falha no login";
    return false;
  }

  public function insert($nome, $usuario, $senha, $nivelAcesso) {
    
    # Criptografar a senha
    # Criptografia: é mão dupla / Hash: é mão única
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    $sql = $this -> db -> prepare('INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?)');
    return $sql -> execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
  }
}