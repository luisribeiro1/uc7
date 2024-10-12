<?php

#inicializa a sessão, permitindo que variaveis de sessao sejam criadas e usadas 
session_start();
# captar a URL redirecionada no .htaccess
# trim() limpa caracteres vazios
# strlowee() converte
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# Substuir a parte da URL que não é útil
$requisicao = str_replace("/uc7/restaurante-mvc/", "", $requisicao);

# Divide em partes usando barra como separador 
$segmentos = explode("/", $requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : $controlador = "mesa-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : $metodo = "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : $identificador = null;

# mesa/editar/4 
# controller        (mesa)
# método            (editar)
# identificador     (4)

switch($controlador){
    case  "mesa-adm": 
        require "controllers/MesaController.php";
        $controller = new MesaController();
        //$controller->index();
        break;
        case "cardapio-adm":
            require "controllers/CardapioController.php";
            $controller = new CardapioController();
            //$controller->index();
            break;
             
        case "avaliacoes-adm":
            require "controllers/AvaliacaoController.php";
            $controller = new AvaliacaoController();
            break;

        case "login":
            require "controllers/LoginController.php";
            $controller = new LoginController();
            break;

        case "cardapio":
            require "controllers/CardapioController.php";
            $controller = new CardapioController();
            $metodo = "ver_cardapio";
            break;
        
        case "reserva":
            require "controllers/ReservaController.php";
            $controller = new ReservaController();
            break;
        
        default:    
        echo "Página não econtrada";
            break;
}

# chama o método do controlador com ou sem o parãmetro $id 
if ($identificador){
    # usado para os métodos excluir e editar, pois ambos usam o identificador 
    $controller->$metodo($identificador);
}else{
    # usado para os métodos index e criar 
    $controller->$metodo();
}
