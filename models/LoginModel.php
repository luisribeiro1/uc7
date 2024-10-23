<?php

require_once "DataBase.php";
class Login 
{
   
    private $db;


    public function __construct(){
    
        $this->db = DataBase::getConexao();
    }


    public function getByUsuarioESenha($usuario,$senhaDoUsuario,$manter_logado){

        
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
              
                // cookie
                return true;
            
            }    
           
        }
        
        $_SESSION["erro"] = "Falha no login";
        return false;
    }
   
    

   
}
