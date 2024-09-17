<?php

# Captar a URL redirecionada no .htaccess
$requisicao = strtolower( $_SERVER['REQUEST_URI']);

# Substituir a parte da URL que nao é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# divide em partes, usando a barra como separador. Cria um array de índice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : null;
$metodo = isset($segmentos[1]) ? $segmentos[1] : null;
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;


# mesa/editar/4
# controller (mesa)
# método (editar)
# identificador (4)

switch($controlador){
    case"mesa":
        require "controllers/MesaController.php";
        $controller = New MesaController();
        $controller->index();
        break;
        default;
        echo "Pagina não encontrada";
        
}
