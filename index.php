<?php

# Captar a URL redirecionada no .htaccess
# "trim()" limpa caracteres vazios no início e final do texto.
# "strtolower()" converte para caixa baixa de letras.
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# Substuir a parte da URL que não é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/","", $requisicao);

# Divide em partes usando barra como separador.
$segmentos = explode("/", $requisicao);

# Verifica o padrão da rota.
$controlador = isset($segmentos[0]) ? $segmentos[0] : $controlador = null;
$metodo = isset($segmentos[1]) ? $segmentos[1] : $metodo = null;
$identificador = isset($segmentos[2]) ? $segmentos[2] : $identificador = null;

# mesa/editar/4.
# controller        (mesa).
# método            (editar).
# identificador     (4).

switch($controlador) {
    case "mesa":
        require "controllers/MesaController.php";
        $controller = new MesaController();
        $controller->index();
        break;
    default:
        echo "Página não encontrada";
        break;
}