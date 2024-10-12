<?php

// Inicializa a sessão, permitindo que variáveis de sessão sejam criadas e usadas.
session_start();

# Captar a URL redirecionada no .htaccess ($_ indica uma super global).
# trim limpa caracteres vazios no início e final de texto.
# strtolower() converte para
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# Substituir a parte da URL que não é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# Divide em partes, usando a barra como separador. Cria um array de índice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : "mesa-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;



# mesa/editar/4
# controller        (mesa)
# método            (editar)
# identificador     (4)

switch($controlador){
    case "mesa-adm":
        require "controllers/MesaController.php";
        $controller = new MesaController();
        break;
    case "cardapio-adm";
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        //$controller->index();
        break;
    case "avaliacoes-adm";
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        break;
    case "login";
        require "controllers/LoginController.php";
        $controller = new LoginController();
        break;
    case "cardapio";
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $metodo = "ver_cardapio";
        break;
    case "reserva";
        require "controllers/ReservaController.php";
        $controller = new ReservaController();
        break;
    default:
        echo "Página não encontrada";
        break;
}

# Chama o método do controlador com ou sem o parâmetro $id.
if ($identificador){
    # Usado para os métodos excluir e editar, pois ambos usam o identificador.
    $controller->$metodo($identificador);
}else{
    # Usado para ps métodos index a criar
    $controller->$metodo();
}

