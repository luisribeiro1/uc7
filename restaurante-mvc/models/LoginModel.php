<?php

// incluir o arquivo com a conexeção com o banco de dados 
require_once "DataBase.php";

class Login

{

    # Criar um atributo privado
    private $db;

    # Método construtor da classe. ele sera executado, quando a classe for instanciada.
    public function __construct(){

        // executa o método estatico para estabelecer a conexão com o banco de dados
        // método estatico é aquele que não precisa ser instalado
        $this->db = DataBase::getConexao();
    }
   

    public function getByUsuarioESenha($usuario, $senhaDoUsuario){
        
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        
        # Se encontrou o usuario
        if($resultado){

            $senhaDoBanco = $resultado["senha"];
            
            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if(password_verify($senhaDoUsuario, $senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];

                return true;
            }

        }
        
        $_SESSION["erro"] = "Falha no login";
        return false;
    }
    
    public function insert($nome, $usuario, $senha){
        # Criptografar a senha
        # Criptografia: mão dupla
        # Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
       $sql = $this->db->prepare("INSERT INTO usuario (nome, usuario, senha) VALUES (?, ?, ?); ");
       return $sql->execute([$nome, $usuario, $senhaCriptografada]);
    }

}

