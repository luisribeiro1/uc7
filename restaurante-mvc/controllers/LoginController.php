<?php

require_once "models/LoginModel.php";

class LoginController{
    private $url = "http://localhost/uc7/restaurante-mvc";
    private $loginModel;


    public function __construct(){
        $this->loginModel = new Login();
    }

    public function index(){
        $baseUrl = $this->url;
        $erro = "";

        require_once "views/LoginForm.php";

    }


public function criar(){
    $nome = "Paulo";
    $usuario = "Paulin05";
    $senha = "123456";
    $this->loginModel->insert($nome,$usuario,$senha);
    echo "Usuario criado com sucesso";

}

public function autenticar(){

    // recupera os valores informados no formulario de login
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    # chama o model para verificar se os dados são validos
    $this->loginModel->getByUsuarioESenha($usuario,$senha);

    # caso houver erro de autenticação, a sessão erro e criada e portanto ela existira aqui 
    # se ela não existir aqui, indica que a aute nticação foi feita com suscesso
    if(isset($_SESSION["erro"])){

        unset($_SESSION["erro"]);   // remove a sessão, pois ela não sera mais necessaria 

        $erro = "<div class='alert alert-danger'> Não foi possivael efutuar o login. Tente novamente</div> ";

        $baseUrl = $this->url;
        //require 'views/LoginForm.php';

    }else{
        header("location: ".$this->url."/mesa-adm");
    }



}

}



