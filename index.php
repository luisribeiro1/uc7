<?php

# Inicializa a sessão, permitindo que variaveis de sessão sejam criadas e usadas 
session_start();

# Captar a URL redirecionada no .htaccess ($_ indica global)
# "trim()" limpa caracteres vazios no inicio e final do texto 
# "strtolower()" converte para caixa baixa
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

#Substituir a parte da URL que não é útil
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# Divide em partes usando a barra como separador. Cria um array de índice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : "mesa-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

# mesa/editar/4
# controller    (mesa)
# método        (editar)
# identificador (4)

switch($controlador){
    case "mesa-adm" :
        ValidaSessao();
        require "controllers/MesaController.php";
        $controller = new MesaController();
        // $controller->index();
        break;
    case "cardapio-adm" :
        ValidaSessao();
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        // $controller->index();
        break;
    case "avaliacoes-adm" :
        ValidaSessao();
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        // $controller->index();
        break;
    case "login" :
        require "controllers/LoginController.php";
        $controller = new LoginController();
        // $controller->index();
        break;
    case "cardapio" :
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $metodo = "ver_cardapio";
        // $controller->index();
        break;
    case "reserva" :
        require "controllers/ReservaController.php";
        $controller = new ReservaController();
        // $controller->index();
        break;
    case "sair" :
        require "controllers/SairController.php";
        $controller = new SairController();
        // $controller->index();
        break;
    default :
        echo "<strong>404</strong> = Não encontrado";
        break;
}

# Chama o método do controlador com ou sem o parâmetro $id
if ($identificador) {
    // Usado para os metodos excluir e editar, pois ambos usam o identificador
    $controller->$metodo($identificador);
}else{
    // Usado para os métodos index e criar
    $controller->$metodo();
}

function ValidaSessao() {
    # Se não exisitir sessão de nome_usuário
    if(!isset($_COOKIE["usuario"])){
        if(!isset( $_SESSION["nome_usuario"])){
    
            $baseUrl = "http://localhost/uc7/restaurante-mvc";
    
            # Redirecionar para Login
            header("location:" .$baseUrl."/login");
        }
    }
}