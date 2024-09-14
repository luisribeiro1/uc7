<?php

# captar a URL redirecionada no .htaccess ($_ indica uma super global)
# trim() limpa caracteres vazios no inici e fial do texto 
# strtolower() converte para minusculo 
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));


# Substituir a parte da URL que não é util
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# divide em partes usando a barra como separador. Cria um array de indice
$seguimentos = explode("/",$requisicao);


# verifica o padrão da rota 
$controlador = isset($seguimentos[0]) ? $seguimentos[0] : null;
$metodo = isset($seguimentos[1]) ? $seguimentos[1] : null;
$identificador = isset($seguimentos[2]) ? $seguimentos[2] : null;


# mesa/editar/4
# controller        (mesa)
# método            (editar)
# identificador     (4)


switch($controlador){
    case "mesa":
        require "controllers/MesaController.php";
        $controller = new MesaController();
        $controller->index();
       break;
    default:
       echo "Pagina não encontrada";
       break;
}