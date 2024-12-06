<?php
require_once 'Database.php';

class Login {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getByUsuarioESenha($usuario,$senhaDoUsuario,$manter_logado) {
        $sql = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        // Se encontrou o usuário
        if($resultado){

            $senhaDoBanco = $resultado["senha"];
    
            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if (password_verify($senhaDoUsuario, $senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["nivelAcesso"] = $resultado["nivelAcesso"];

                if($manter_logado == true){
                    setcookie("usuario", $resultado["nome"], time() + 86400, "/");
                }
                
                return true;
            }
        }

        $_SESSION["erro"] = "Falha no login";
        return false;

    }

    
    public function insert($nome, $usuario, $senha) {

        # Criptografar a senha
        # Criptografia: mão dupla / Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = $this->db->prepare(
            'INSERT INTO usuarios (nome, usuario, senha) VALUES (?, ?, ?)'
        );
        return $sql->execute([$nome, $usuario, $senhaCriptografada]);
    }

    public function updatePassword($idUsuario, $senha) {

        # Criptografar a senha
        # Criptografia: mão dupla / Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = $this->db->prepare(
            'UPDATE usuarios set senha=? WHERE idUsuario=?'
        );
        return $sql->execute([$idUsuario, $senhaCriptografada]);
    }

}
