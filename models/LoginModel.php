<?php

# Incluir um arquivo com a conexão com o banco de dados
require_once "DataBase.php";
class Login 
{
    private $db;
 
    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getByUsuarioESenha($usuario,$senhaDoUsuario) {
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if($resultado) {
            $senhaDoBanco = $resultado["senha"];

            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if (password_verify($senhaDoUsuario,$senhaDoBanco)) {
                $_SESSION["nome_usuario"] = $resultado["nome"];
                return true;
            }
        }
        $_SESSION["erro"] = "Falha no login";
        return false;
    }

    # Método para inserir os dados na tabela
    public function insert($nome,$usuario,$senha) {
        # Criptografar a senha
        # Criptografia: mão dupla / hash: mão única
        $senhaCriptografada = password_hash($senha,PASSWORD_BCRYPT);
        $sql = $this->db->prepare(
            "INSERT INTO usuarios (nome,usuario,senha) VALUES (?, ?, ?)"
        );
        return $sql->execute([$nome,$usuario,$senhaCriptografada]);
    }
}
