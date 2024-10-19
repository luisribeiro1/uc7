<?php

# incluir o arquivo com a conexão com o banco de dados
require_once "DataBase.php";
class Login
{
    # Criar um atributo privado para receber a conexão com o banco
    private $db;

    # Método construtor da classe. Ele será executado, quando a classe for instanciada
    public function __construct(){
        # Executa o método estatico para estabelecer a conexão com o banco de dados
        # Método estático é aquele que não precisa ser instanciado (new)
        $this->db = DataBase::getConexao();
    }

    # Criar o método para retornar a lista de mesas 

    public function getByusuarioESenha($usuario, $senhaDoUsuario, $manter_logado){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        
        # Se encontrou o usuario
        if($resultado){
            
            $senhaDoBanco = $resultado["senha"];
            
            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if(password_verify($senhaDoUsuario, $senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["nivel_acesso"] = $resultado["nivelAcesso"];
                // Cookie
                if($manter_logado == true){
                setcookie("usuario", $resultado["nome"], time() + 86400, "/");
                setcookie('nivelUsuario', $resultado["nivelAcesso"], time() + 86400, "/");
                }
                return true;
            }

        }
        $_SESSION["erro"] = "Falha no login";
        return false;
    }

    public function insert($nome, $usuario, $senha, $nivelAcesso){
        # Criptografar a senha
        # Criptografia: mão dupla
        # Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
       $sql = $this->db->prepare("INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?); ");
       return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
    }
}