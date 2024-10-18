<?php

require_once "DataBase.php";
class Login 
{
   
    private $db;


    public function __construct(){
    
        $this->db = DataBase::getConexao();
    }


    public function getByUsuarioESenha($usuario,$senhaDoUsuario){

        
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        //se encontrou o usuário
        if($resultado){
            
            $senhaDoBanco = $resultado["senha"];

            # Verifica se as senhas são iguais aos olhos do algoritmo de criptografia
            if(password_verify($senhaDoUsuario, $senhaDoBanco)){
                
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["numero_usuario"] = $resultado["nivelAcesso"];
              
                
                return true;
            
            }    
           
        }
        
        $_SESSION["erro"] = "Falha no login";
        return false;
    }
   
    public function insert($nome, $usuario, $senha, $nivelAcesso) {

        //Criptografar a senha
        // Criptografia: mão dupla / Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);


        $sql = $this->db->prepare("INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ? , ?)");

        return $sql->execute([$nome,$usuario,$senhaCriptografada,$nivelAcesso]);
    }

   
}
