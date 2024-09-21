<?php

# Captar a URL reridicionada no .htaccess  ($_indica uma super global)
# trim() limpa caracteres vazios no inicio e final do texto.
# srttolower() converte para minuscula
$requisicao = trim(strtolower($_SERVER["REQUEST_URI"]));

# Subistitui a parte da url que não é util
$requisicao = str_replace("/uc7/restaurante-mvc/","", $requisicao);

//$requisicao = strtolower($requisicao);
//echo $requisicao;

#Divide em partes , usando a barra como separador. Cria um array de indice
$segmentos = explode("/",$requisicao);
//var_dump($segmentos);

# verifica o padrao da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : null;
$metodo = isset($segmentos[1]) ? $segmentos[1] : null;
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

// echo "<br>". $controlador;
// echo "<br>". $metodo;
// echo "<br>". $identificador;

# mesa/editar/4
# controller     (mesa)
# metodo         (editar)
# identificador   (4)
# mesa/novo 
switch($controlador){
    case "mesa-adm":
        require "controllers/MesaController.php";
        $controller = new MesaController();
        $controller->index();
        break;
                 

    case "cardapio-adm":
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $controller->index();
        break;
    
        
        
    case "avaliacoes-adm":
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        $controller->index();
        break;
    default:
        echo "Página não encontrada";     
        break; 
    
        
}
