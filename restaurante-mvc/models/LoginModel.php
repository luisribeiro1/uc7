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
   

    public function getByUsuarioESenha($usuario, $senhaDoUsuario, $manter_logado){
        
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        
        # Se encontrou o usuario
        if($resultado){
        
            $senhaDoBanco = $resultado["senha"];
            
            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if(password_verify($senhaDoUsuario, $senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["nivel_usuario"] = $resultado["nivelAcesso"];
                // cookie
                if($manter_logado == true){
                    setcookie("usuario",$resultado["nome"],time()+ 86400,"/");
                }
                return true;
            }

        }
        
        $_SESSION["erro"] = "Falha no login";
        return false;
       
    }

    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM login WHERE id = ?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
     }
    
    public function insert($nome, $usuario, $senha, $nivelAcesso){
        # Criptografar a senha
        # Criptografia: mão dupla
        # Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
       $sql = $this->db->prepare("INSERT INTO usuario (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?,?); ");
       return $sql->execute([$nome, $usuario, $senhaCriptografada, $nivelAcesso]);
    }

}

