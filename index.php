<?php

# Captar a URL redirecionada no .htaccess
# trim limpa caracteres vazios no início e final do texto
# strtolower() converte para minúsculos
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# Substituir a parte da URL que não é útil
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# Divide em partes, usando a barra como separador. Cria um array de indice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0])
    ? $segmentos[0]
    : "mesa-adm";

$metodo = isset($segmentos[1])
    ? $segmentos[1]
    : "index";

$identificador = isset($segmentos[2])
    ? $segmentos[2]
    : null;

# mesa/editar/4
# controller      (mesa)
# método          (editar)   
# identificador   (4)

switch($controlador){
    case "mesa-adm" :
        require "controllers/MesaController.php";
        $controller = new MesaController();
        //$controller->index();
        break;
        
    case "cardapio-adm" :
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $controller->index();
        break;

    case "avaliacoes-adm" :
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        $controller->index();
        break;
    
        default:
        echo "Página não encontrada";
        break;
}

# Chama o método do controlador com ou sem o parâmetro $id
if($identificador){
    # Usado para os métodos excluir e editar, pois ambos usam o identificador
    $controller->$metodo($identificador);
}else{
    # Usado para os métodos index e criar
    $controller->$metodo();
}