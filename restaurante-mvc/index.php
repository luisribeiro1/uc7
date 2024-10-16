<?php
session_start();
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
        ValidaSesao();
        require "controllers/MesaController.php";
        $controller = New MesaController();
    
        break;
        case"cardapio-adm":
            ValidaSesao();
            require "controllers/CardapioController.php";
            $controller = New CardapioController();
         
            break;
            case"avaliacoes-adm":
                require "controllers/AvaliacoesController.php";
                $controller = New AvaliacoesController();

            case"login":
                require "controllers/LoginController.php";
                $controller = New LoginController();
                break;

            case"cardapio":
                require "controllers/CardapioController.php";
                $controller = New CardapioController();
                $metodo = "ver_cardapio";
                break;

            case"reserva":
                require "controllers/ReservaController.php";
                $controller = New ReservaController();
                break;

            case"sair":
                require "controllers/SairController.php";
                $controller = New SairController();
                break;

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


function ValidaSesao(){
    # Se não existir a sessão ativas
    if(isset( $_SESSION["nome_usuario"])){

         $baseUrl = "http://localhost/uc7/restaurante-mvc";
  
        # Redirecionar o usuario para a pagina de login
        header("location: " . $baseUrl."/login");
    }
}   