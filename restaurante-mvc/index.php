<?php

session_start();

# captar a URL redirecionada no .htaccess ($_ indica uma super global)
# trim() limpa caracteres vazios no inici e fial do texto 
# strtolower() converte para minusculo 
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));


# Substituir a parte da URL que não é util
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# divide em partes usando a barra como separador. Cria um array de indice
$seguimentos = explode("/",$requisicao);


# verifica o padrão da rota 
$controlador = isset($seguimentos[0]) ? $seguimentos[0] : "mesa-adm";
$metodo = isset($seguimentos[1]) ? $seguimentos[1] : "index";
$identificador = isset($seguimentos[2]) ? $seguimentos[2] : null;


# mesa/editar/4
# controller        (mesa)
# método            (editar)
# identificador     (4)


switch($controlador){
    case "mesa-adm":
        ValidaSessao();
        require "controllers/MesaController.php";
        $controller = new MesaController();
        //$controller->index();
       break;
 
    case "cardapio-adm":
        ValidaSessao();
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        //$controller->index();
       break;


    case "avaliacoes-adm":
        ValidaSessao();
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
     
       break;

       
    case "cardapio":
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $metodo = "ver_cardapio";
        break;

    case "login":
        require "controllers/LoginController.php";
        $controller = new LoginController();
        break;

    case "reserva":
        require "controllers/ReservaController.php";
        $controller = new ReservaController();
        break;

    case "sair":
        require "controllers/SairController.php";
        $controller = new SairController();
        break;

        default:
        echo "Pagina não encontrada";
        break;

    
}

# chama o metodo do controlador com ou sem o parametro $id
if ($identificador){
    # usado para os metodos excluir e editar, pois ambos usam  identificador
    $controller->$metodo($identificador);
}else{
     #usado para os metodos index e criar
    $controller->$metodo();
}


function ValidaSessao(){
    if(!isset($_COOKIE["usuario"])){
    # se nao existir a sessao de nome_usuario
    if(!isset($_SESSION["nome_usuario"])){

      $url = "http://localhost/uc7/restaurante-mvc";

        
        # redireciona para o login
        header("location: ".$url."/login");
    }
}
}