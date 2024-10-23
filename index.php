<?php 

# Inicializa a sessão, permitindo que variáveis de sessão sejam criadas e usadas.
session_start();

# captar a URL redirecionada no .htaccess
# trim limpa caracteres vazios no início e final de texto.
# strtolower() converte para minúsculas
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# substituir a parte da URL que não é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/", "",$requisicao);

# Divide em partes, usando a barra como separador 
$segmentos = explode("/", $requisicao);

$controlador = isset($segmentos[0]) ? $segmentos[0]: "mesa-adm" ;
$metodo = isset($segmentos[1]) ? $segmentos[1]: "index" ;
$identificador = isset($segmentos[2]) ? $segmentos[2]: null ;

# mesa/ editar/ 4
# controller        (mesa)
# método            (editar)
# identificador     (4)
# mesa/novo

switch($controlador){
    case "mesa-adm":
        ValidaSessao();
        require "controllers/MesaController.php";
        $controller = new MesaController();
        break;

    case "cardapio-adm":
        ValidaSessao();
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        break;

    case "avaliacoes-adm":
        ValidaSessao();
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        break;

    case "login":
        require "controllers/LoginController.php";
        $controller = new LoginController();
        break;

    case "usuario":
        require "controllers/UsuarioController.php";
        $controller = new UsuarioController();
        break;

    case "cardapio":
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $metodo = "ver_cardapio";
        break;

    case "reserva":
        require "controllers/ReservaController.php";
        $controller = new ReservaController();
        break;

    case "sair":
        require "controllers/SairController.php";
        $controller = new SairController();
        break;

    default:
    echo "Página não encontrada";
    break;
}

# chama o método do controlador com ou sem o parâmetro $id
if ($identificador) {
    # Usado para os métodos excluir e editar, pois ambos usam o identificador 
    $controller->$metodo($identificador);
}else {
    # Usado para os métodos index e criar
    $controller->$metodo();
}

function ValidaSessao() {
    # Se não existir a sessão do nome_usuario
    if(!isset($_COOKIE["usuario"]) && !isset($_COOKIE["nivelAcesso"])){
        # Se não existir a sessão de nome_usuario
        if(!isset($_SESSION["nome_usuario"])) {
            $url = "http://localhost/uc7/restaurante-MVC";
            # Se não existir sessão o usuário deve ser redirecionado para o login 
            header("location: " . $url . "/login");
        }
    }  
}