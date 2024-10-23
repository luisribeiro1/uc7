<?php

# inclui  o arquivo model
require_once "models/LoginModel.php";

class LoginController
{
    # criar a propriedade que recebe o endereço absoluto do site
    # este endereço será usado para compor as notas
    # url é uma propriedade pois está sendo criada no escopo da classe
    private $loginModel;
    private $baseUrl = "http://localhost/uc7/restaurante-mvc";

    # cria a propriedade que sera usada nos estados abaixo
    
    
    public function __construct(){
        #instância  a classe  mesa para obter os dados do model
        $this->loginModel = new Login();
    } 



    public function index()
    {
        # instancia a classe Mesa para obter dados do Model
       // $cardapioModel = new Cardapio();
        # cria um array que recebe a lista de mesa que o model retornará
       // $lista_de_cardapio = $cardapioModel->getAllCardapio();

        # Recebe o valor da propriedade $url e fica disponivel para uso na view
        $baseUrl = $this->baseUrl; 
        $erro = "";   
        require "views/LoginForm.php";   // Vamos carregar o formulário de login
      // echo "Pagina de Login";
    }
    public function criar(){
        $nome = "Anderson Andre";
        $usuario = "Andre";
        $senha = "123456";
        $nivelAcesso = "1";
        
        $this->loginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "Usuario criado com sucesso";
    }
     public function autenticar(){
        //recupera os valores informados no formulario de login

        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["logado"])? true : false;
        
        
       
        //chama o model para verificar se os dados sao validos 
        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        # caso huver erro de autenticacao, a sessao erro é criada e portanto ela existira aqui
        # se ela não existir aqui, indica que a autenticacão foi feita com sucesso 

        if (isset($_SESSION["erro"])){ // remove a sessão, pois ela não será mais necessaria 

           // echo "Dados incorretos.";
            unset($_SESSION["erro"]); // remove a sessao
            $erro = "<div class='alert alert-danger'>Não foi possivel efetuar o login. tente novamente</div>" ;
            $baseUrl = $this->baseUrl;
            require 'views/loginForm.php';
        }else{
            //echo "Usuario " .$_SESSION["nome_usuario"] . "login com sucesso";
            header("location:" . $this->baseUrl . "/mesa-adm");
        }




     }

   
}