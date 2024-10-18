<?php
# Incluir o arquivo com a conexão com o banco de dados.
require_once "DataBase.php";

class Login{

    # Criar um atributo privado para receber a conexão com o banco.
    private $db;
    
    # Método construtor da classe. Ele será executado, quando a classe for instanciada.
    public function __construct() {

        # Executa o método estático para estabelecer a conexão com o banco de dados.
        # Métodos estáticos é aquele que não precisa ser instanciado.
        $this->db = DataBase::getConexao();
    }

    public function getByUsuarioESenha($usuario, $senhaDoUsuario){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $sql->execute([$usuario]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        // Se encontrou o usuário
        if($resultado){

            $senhaDoBanco = $resultado["senha"];
    
            // Verifica se as senhas são iguais aos olhos do algoritimo de criptografia.
            if(password_verify($senhaDoUsuario, $senhaDoBanco)){
                $_SESSION["nome_usuario"] = $resultado["nome"];
                $_SESSION["nivel_acesso"] = $resultado["nivelAcesso"];
                return true;  
            }
        }
        $_SESSION["erro"] = "Falha no login";
        return false;
    }

    public function insert($nome, $usuario, $senha, $nivelAcesso){

        // Criptografar a senha
        // Criptografia: Mão dupla / Hash: mão única
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare(
            "INSERT INTO usuarios (nome,usuario,senha,nivelAcesso)
            VALUES(?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$usuario,$senhaCriptografada, $nivelAcesso]);
    }
}