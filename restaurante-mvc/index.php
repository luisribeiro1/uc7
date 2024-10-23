<?php

# inicializa a sessão, permitindo que ariáveis de sessão sejam criadas e acessadas
session_start();

# capta a URL redireionada no arquivo .htaccess
# strtolower, converte para letras minúsculas
# trim, limpa os caracteres vazios no início e final
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# substituo parte da URL que não é útil
$requisicao = str_replace("/uc7/restaurante-mvc/", "", $requisicao);

# divide em partes, usando a / como separador. Cria um array de índices
$segmentos = explode("/", $requisicao);

# verifica o padrão da rota utilizando o array $segmentos explodido
$controlador = isset($segmentos[0]) ? $segmentos[0] : "mesa-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

/* mesa/editar/4
  controller -> mesa
  método -> editar
  identificador -> 4
*/

switch ($controlador) {

  case 'mesa-adm':
    validaSessao();
    require "controllers/MesaController.php";
    $controller = new MesaController();
    // $controller -> index();
    break;

  case 'cardapio-adm':
    validaSessao();
    require "controllers/CardapioController.php";
    $controller = new CardapioController();
    // $controller -> index();
    break;

  case 'avaliacoes-adm':
    validaSessao();
    require "controllers/AvaliacaoController.php";
    $controller = new AvaliacaoController();
    // $controller -> index();
    break;

  case 'login':
    require "controllers/LoginController.php";
    $controller = new LoginController();
    break;

  case 'cardapio':
    require "controllers/CardapioController.php";
    $controller = new CardapioController();
    $metodo = "ver_cardapio";
    break;

  case 'reserva':
    require "controllers/ReservaController.php";
    $controller = new ReservaController();
    break;

  case 'sair':
    require "controllers/sairController.php";
    $controller = new SairController();
    break;

  case 'usuario-adm':
    validaSessao();
    require "controllers/UsuarioController.php";
    $controller = new UsuarioController();
    break;

  default:
    $baseUrl = "http://localhost/uc7/restaurante-mvc";
    header("location: " . $baseUrl . "/views/templates/html/notfound.html");
    break;
}

# chama o método do controlador com ou sem parâmetro $id
if ($identificador) {
  # usado para os métodos exluir e editar, pois ambos usam o identificador
  $controller->$metodo($identificador);
} else {
  # usado para os métodos index e criar
  $controller->$metodo();
}

function validaSessao()
{

  if (!isset($_COOKIE['usuario'])) {

    if (!isset($_COOKIE['nivelAcesso'])){

      # senão existir a sessão de nome_usuario
      if (!isset($_SESSION["nome_usuario"])) {
  
        $baseUrl = "http://localhost/uc7/restaurante-mvc";
  
        header("location:" . $baseUrl . "/login");
      }
    }
  }
}