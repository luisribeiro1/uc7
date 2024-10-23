<?php

# Incluir o arquivo com a conexão com o banco o banco de dados
require_once "DataBase.php";

class Login{

 #criar um array associativa com a relaçao das mesas
    // private $listaDeMesas = [
    //     ["id" => 1, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 2, "lugares" => 6, "tipo" => "oval"],
    //     ["id" => 3, "lugares" => 4, "tipo" => "quadrada"],
    //     ["id" => 4, "lugares" => 8, "tipo" => "retangular"],
    //     ["id" => 5, "lugares" => 2, "tipo" => "redonda"],
    //     ["id" => 6, "lugares" => 6, "tipo" => "redonda"],
    //     ["id" => 7, "lugares" => 8, "tipo" => "quadrada"],
    //     ["id" => 8, "lugares" => 2, "tipo" => "redonda"],
        
    // ];

    # Criar um atributo privado para receber a conexao com o banco
    private $db;
    # Metodo construtor da classe. Ele sera executado sempre que a classe for instânciada
    public function __construct(){

        # Executa o metodo estático para estabelecer a conexão com o banco de dados
        # Metodo estatico é aquele que não precisa ser instânciado
        $this->db = DataBase::getConexao();
    }

    #criar o metodo para retornar a lista de mesas
    public function getByUsuarioESenha($usuario,$senhaDoUsuario,$manter_logado){
        echo "$usuario - $senhaDoUsuario";
        $sql = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        # Se encontrou o usuario
        if($resultado){
             $senhaDoBanco = $resultado["senha"];
        
           // Verifica se as senhas são iguais aos olhos do algoritimo de criptografia
           if (password_verify($senhaDoUsuario, $senhaDoBanco)){
               $_SESSION["nome_usuario"] = $resultado["nome"];
               $_SESSION['nivel_usuario'] = $resultado['nivel_usuario'];

               if($manter_logado == true){
                 setcookie("usuario",$resultado["nome"],time()+ 86400,"/");
                  // criar cookie  
                }  return true;       
        }   
    }   
        
    $_SESSION["erro"] = "Falha de login";
     return false;

  
    }    
        // return $this->listaDeMesas;
        
        # Executa o codigo SQL no banco de dados atravéz do método query
        
        # O método query é usado para consultas, ou seja, quando usar SELECT 
        // $resultadoDaConsulta  = $this->db->query("SELECT * FROM mesas");
        
        # Retorna um array associativo com o resultado da consulta
        // return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    
 
    //public function insert($nome,$usuario,$senha,$nivelAcesso){
    //    //cripitografar a senha
    //    #cripitografia em mao dupla / Hash: mão unica
    //    $senhaCriptografada = password_hash($senha,PASSWORD_BCRYPT);

    //    $sql = $this->db->prepare(
    //        'INSERT INTO usuarios (nome,usuario,senha,nivelAcesso)VALUES (?,?,?,)'
    //     );
    //        return $sql->execute([$nome, $usuario, $senhaCriptografada,$nivelAcesso]); 
    //}        
                
        
}
      
   