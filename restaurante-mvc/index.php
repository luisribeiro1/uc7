<?php

# capta a URL redireionada no arquivo .htaccess
# strtolower, converte para letras minúsculas
# trim, limpa os caracteres vazios no início e final
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# substituo parte da URL que não é útil
$requisicao = str_replace("/uc7/restaurante-mvc/", "", $requisicao);

# divide em partes, usando a / como separador. Cria um array de índices
$segmentos = explode("/", $requisicao);

# verifica o padrão da rota utilizando o array $segmentos explodido
$controlador = isset($segmentos[0]) ? $segmentos[0] : null;
$metodo = isset($segmentos[1]) ? $segmentos[1] : null;
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

/* mesa/editar/4
  controller -> mesa
  método -> editar
  identificador -> 4
*/

switch ($controlador){
  case 'mesa':
    require "controllers/MesaController.php";
    $controller = new MesaController();
    $controller -> index();
    break;
  default:
    echo "Página não encontrada";
  break;
}