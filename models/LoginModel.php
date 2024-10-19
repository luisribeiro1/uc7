<?php
require_once "DataBase.php";

class login{

    # Criar um atributo privado para receber a conexão com o banco
    private $db;

    # Criar o método da classe
    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    
    # Método para retornar um item especifico do cardapio
    public function getByUsuarioESenha($usuario,$senhaDoUsuario,$manter_logado){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        // se encontrou o usuário
        if($resultado){

            $senhaDoBanco = $resultado["senha"];
            
            # Verifica se as senhas são iguais aos olhos do algorimo de criptografia
            if(password_verify($senhaDoUsuario,$senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["nivelAcesso"] = $resultado["nivelAcesso"];
                // cookie - Nome do cookie, Valor, tempo de expiração (segundos), escopo "/" = global.
                if($manter_logado == true){
                    setcookie("usuario", $resultado["nome"], time() + 86400, "/"); 
                    setcookie("nivel", $resultado["nivelAcesso"], time() + 86400, "/"); 
                }
                return true;
            }
        }
        $_SESSION["erro"] = "Falha no Login";
        return false;
    }
    # Criar método para insetir os dados na tabele
    public function insert($nome,$usuario,$senha,$nivelAcesso){

        # criptografar senha
        // Criptografia: é mão dupla || Hash: é mão unica
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = $this->db->prepare( 
            "INSERT INTO usuarios (nome, usuario, senha, nivelAcesso)
            VALUES (?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$usuario,$senhaCriptografada,$nivelAcesso]);
    }
}