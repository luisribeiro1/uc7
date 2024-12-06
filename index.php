<?php
# Inicializa a sessão, permitindo que variáveis de sessão sejam criadas e usadas
session_start();

# Captar a URL redirecionada no .htaccess  ($_ indica uma super global)
# trim() limpa caracteres vazios no início e final do texto. 
# strtolower() converte para minúsculas 
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# Substituir a parte da URL que não é útil.
$requisicao = str_replace("/uc7/restaurante-mvc/","",$requisicao);

# Divide em partes, usando a barra como separador. Cria um array de índice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
# $segmentos[0] conterá o primeiro elemento da rota que identificaremos com o controller
$controlador = isset($segmentos[0]) ? $segmentos[0] : "mesa-adm";

# $segmentos[1] conterá o segundo elemento da rota, ou seja, o método
# Aqui verificamos se ele existe e não for vazio. Caso sim, assume index como método
$metodo = isset($segmentos[1]) && $segmentos[1] != "" ? $segmentos[1] : "index";

# $segmentos[2] conterá o terceiro elemento da rota, ou seja, o identificador
# Aqui verificamos se ele existe e não for vazio. Caso sim, assume null
$identificador = isset($segmentos[2]) && $segmentos[2] != "" ? $segmentos[2] : null;

# mesa/editar/4
# controller        (mesa)
# método            (editar)
# identificador     (4)

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

    case "avaliacoes":
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        break;   

    case "pizzas":
        require "controllers/PizzaController.php";
        $controller = new PizzaController();
        break;        
    case "contatos":
        require "controllers/ContatoController.php";
        $controller = new ContatoController();
        break;       

    case "login":
        require "controllers/LoginController.php";
        $controller = new LoginController();
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

    case "usuario":
        require "controllers/UsuarioController.php";
        $controller = new UsuarioController();
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
}else{
    # Usado para os métodos index e criar
    $controller->$metodo();
}

function ValidaSessao(){

    # Se não existir o cookie do usuário
    if(!isset($_COOKIE["usuario"])){

        # Se não existir a sessão de nome_usuario
        if(!isset($_SESSION["nome_usuario"])){

            $baseUrl = "http://localhost/uc7/restaurante-mvc";

            # Redireciona o usuário para a página de login
            header("location:" . $baseUrl . "/login");

        }
    }
}