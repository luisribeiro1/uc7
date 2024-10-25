<?php
require_once 'Database.php';

class Login {
    private $db;

    public function __construct() {
        $this->db = Database::getConexao();
    }

    public function getByUsuarioESenha($usuario,$senhaDoUsuario,$manter_logado) {
        $sql = $this->db->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        // Se encontrou o usuário
        if($resultado){

            $senhaDoBanco = $resultado["senha"];
    
            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if (password_verify($senhaDoUsuario, $senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["nivel_usuario"] = $resultado["nivelAcesso"];

                // criar cookie    
                if($manter_logado == true){
                    setcookie("usuario", $resultado["nome"], time() + 86400, "/");
                    setcookie("nivel_acesso", $resultado["nivelAcesso"], time() + 86400, "/");
                }
               
   
                return true;
            }
        }

        $_SESSION["erro"] = "Falha no login";
        return false;

    }

    public function insert($nome, $usuario, $senha,$nivelAcesso) {

        # Criptografar a senha
        # Criptografia: mão dupla / Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
    
        $sql = $this->db->prepare(
            'INSERT INTO usuario (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?)');
        return $sql->execute([$nome, $usuario, $senhaCriptografada,$nivelAcesso]);
    }
    


}
