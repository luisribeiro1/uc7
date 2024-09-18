<?php

# Captar a URL redirecionada no .htaccess ($_ indica global)
# "trim()" limpa caracteres vazios no inicio e final do texto 
# "strtolower()" converte para caixa baixa
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

#Substituir a parte da URL que não é útil
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# Divide em partes usando a barra como separador. Cria um array de índice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : null;
$metodo = isset($segmentos[1]) ? $segmentos[1] : null;
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

# mesa/editar/4
# controller    (mesa)
# método        (editar)
# identificador (4)

switch($controlador){
    case "mesa" :
        require "controllers/MesaController.php";
        $controller = new MesaController();
        $controller->index();
        break;
    
    default :
        echo "Página não encontrada";
        break;
}
