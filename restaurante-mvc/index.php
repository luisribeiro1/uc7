<?php

# Captar a URL redirecionada no .htaccess
$requisicao = strtolower( $_SERVER['REQUEST_URI']);

# Substituir a parte da URL que nao é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# divide em partes, usando a barra como separador. Cria um array de índice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : "mesa-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;


# mesa/editar/4
# controller (mesa)
# método (editar)
# identificador (4)

switch($controlador){
    case"mesa-adm":
        require "controllers/MesaController.php";
        $controller = New MesaController();
      //  $controller->index();
        break;
        case"cardapio-adm":
            require "controllers/CardapioController.php";
            $controller = New CardapioController();
          //  $controller->index();
            break;
            case"avaliacoes-adm":
                require "controllers/AvaliacoesController.php";
                $controller = New AvaliacoesController();
            //    $controller->index();
                default:
                echo "Pagina não encontrada";
            break;
            
    
        
}

// chama o metodo do controlador com ou sem parametro $id
if ($identificador) {
    // usado para os metodos excluir e editar, pois ambos usam o indentificador
    $controller-> $metodo($identificador);
}else{
    // usado para os metodos index e criar
    $controller->$metodo();
}


   