<?php 

# captar a URL redirecionada no .htaccess
# trim limpa caracteres vazios no início e final de texto.
# strtolower() converte para minúsculas
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));


# substituir a parte da URL que não é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/", "",$requisicao);

# Divide em partes, usando a barra como separador 
$segmentos = explode("/", $requisicao);



$controlador = isset($segmentos[0]) ? $segmentos[0]: null ;
$metodo = isset($segmentos[1]) ? $segmentos[1]: null ;
$identificador = isset($segmentos[2]) ? $segmentos[2]: null ;

# mesa/ editar/ 4
# controller        (mesa)
# método            (editar)
# identificador     (4)
# mesa/novo

switch($controlador){
    case "mesa":
        require "controllers/MesaController.php";
        $controller = new MesaController();
        $controller->index();
        break;
    default:
    echo "Página não encontrada";
    break;
}